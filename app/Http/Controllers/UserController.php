<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the specified user.
     *
     * @param  int|string $id
     * @param string $name
     */
    public function show($id, $name = '')
    {
        $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
        $query = DB::table('users');

        $title = 'user-' . $id;
        $title .= (($name == '') ? '' : ('-' . $name));

        if (is_numeric($id)) {
            $name = ucfirst($name);
            $query = $query->where('id', $id);
        } else {
            $name = trim(ucfirst($name) . ' ' . ucfirst($id));
            unset($id);
        }
        
        if ($name <> '') { 
            $query = $query->where('name', 'like', "%$name%");
        }
        
        $users = $query->paginate(10);

        return view('Pages.user', [
            'title' => $title,
            'topic' => 'Інформація про користувача(-ів):',
            'columnNames' => $columnNames,
            'users' => $users,
        ]);
    }

    /**
     * Show all users
     */
    public function showAll()
    {
        //names of all table columns
        $columnNames = DB::getSchemaBuilder()->getColumnListing('users');

        //all table rows with pagination
        $users = DB::table('users')->paginate(10);

        return view('Pages.user', [
            'title' => 'users-all',
            'topic' => 'Список користувачів:',
            'columnNames' => $columnNames,
            'users' => $users,
        ]);
    }

    /**
     * Show  users by queries in lesson7 (using facade DB)
     */
    public function showByQuery($id)
    {
        //all column names of table 'user' in array
        $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
        switch ($id) {
            case 1://p.2 All records from table 'user'
                $users = DB::table('users')->paginate(10);
                break;
            case 2://p.4 Only columns 'name' and 'email'
                $columnNames = ['name', 'email'];
                $users = DB::table('users')->select('name', 'email')->paginate(10);
                break;
            case 3://p.5 Rename column 'email' to 'user_email'
                $columnNames = ['name', 'user_email'];
                $users = DB::table('users')->select('name', 'email as user_email')->paginate(10);
                break;
            case 4://p.6 Users with age = 30
                $users = DB::table('users')->where('age', 30)->paginate(10);
                break;
            case 5://p.6 Users with age <> 30
                $users = DB::table('users')->where('age', '<>', 30)->paginate(10);
                break;
            case 6://p.6 Users with age > 30
                $users = DB::table('users')->where('age', '>', 30)->paginate(10);
                break;
            case 7://p.6 Users with age < 30
                $users = DB::table('users')->where('age', '<', 30)->paginate(10);
                break;
            case 8://p.6 Users with age <= 30
                $users = DB::table('users')->where('age', '<=', 30)->paginate(10);
                break;
            case 9://p.7 Users with age between 20 and 30
                $users = DB::table('users')->whereBetween('age', [20, 30])->paginate(10);
                break;
            case 10://p.8 Users with age=30 or salary=500 or id>4
                $users = DB::table('users')->where('age', 30)->orWhere('salary', 500)->orWhere('id', '>', 4)->paginate(10);
                break;
            case 11://p.9 Users with age between 20 and 30 or salary between 400 and 800
                $users = DB::table('users')->whereBetween('age', [20, 30])->orWhereBetween('salary', [400, 800])->paginate(10);
                break;
            case 12://p.10 Users without age between 30 and 40 order by 'salary' decrease
                $users = DB::table('users')->whereNotBetween('age', [30, 40])->orderByDesc('salary')->paginate(10);
                break;
            case 13://p.11 Collection of names.
                $columnNames = ['name'];
                $users = DB::table('users')
                    ->select(DB::raw("left(ltrim(name), locate(' ', ltrim(name))-1)"))
                    ->distinct()->paginate(10);
                break;
            case 14: //p.12 All users sorted in random order.
                $users = DB::table('users')->inRandomOrder()->paginate(10);
                break;
            case 15://p.13 One random
                $users[] = DB::table('users')->inRandomOrder()->first();
                break;
            case 16://p.14 The first thee users with age=30
                $users = DB::table('users')->where('age', 30)->take(3)->get();
                break;
            case 17://p.15 ten users with age=30 start 3rd
                $users = DB::table('users')->where('age', '=', 30)->skip(2)->take(10)->get();
                break;
            default: return redirect()->route('homework');
        };
        return view('Pages.user', [
            'title' => 'users-by-query',
            'topic' => 'Список користувачів за запитом:',
            'columnNames' => $columnNames,
            'users' => $users,
            'id' => $id,
        ]);
    }

     /**
     * Show all users-admins
     */
    public function showAdminAll()
    {
        return view('Pages.admin', [
            'title' => 'admins-all',
            'topic' => 'Список адміністраторів:'
        ]);
    }

    /**
     * Show the specified admin.
     *
     * @param  int $id
     */
    public function showAdmin($id)
    {
        return view('Pages.admin', [
            'title' => 'admin-' . $id,
            'id' => $id,
            'name' => '',
            'topic' => 'Інформація про адміністратора:'
        ]);
    }
}
