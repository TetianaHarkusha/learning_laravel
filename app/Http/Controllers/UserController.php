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
        $title = 'user-' . $id;
        $title .= (($name == '') ? '' : ('-' . $name));

        return view('Users.newUser', [
            'title' => $title,
            'content' => '<h1>Інформація про користувача:</h1>',
            'id' => $id,
            'name' => $name,
            'age' => 33,
            'salary' => 2500,
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
            'content' => "<h3>Список користувачів</h3>",
            'columnNames' => $columnNames,
            'users' => $users,
        ]);
    }

    /**
     * Show  users by queries in lesson7
     */
    public function showByQuery($id)
    {
        switch ($id) {
            case 1://p.2 All records from table 'user'
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
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
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', 30)->paginate(10);
                break;
            case 5://p.6 Users with age <> 30
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', '<>', 30)->paginate(10);
                break;
            case 6://p.6 Users with age > 30
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', '>', 30)->paginate(10);
                break;
            case 7://p.6 Users with age < 30
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', '<', 30)->paginate(10);
                break;
            case 8://p.6 Users with age <= 30
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', '<=', 30)->paginate(10);
                break;
            case 9://p.7 Users with age between 20 and 30
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->whereBetween('age', [20, 30])->paginate(10);
                break;
            case 10://p.8 Users with age=30 or salary=500 or id>4
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', 30)->orWhere('salary', 500)->orWhere('id', '>', 4)->paginate(10);
                break;
            case 11://p.9 Users with age between 20 and 30 or salary between 400 and 800
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->whereBetween('age', [20, 30])->orWhereBetween('salary', [400, 800])->paginate(10);
                break;
            case 12://p.10 Users without age between 30 and 40 order by 'salary' decrease
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->whereNotBetween('age', [30, 40])->orderBy('salary', 'desc')->paginate(10);
                break;
            case 13://p.11 Collection of names.
                $columnNames = ['name'];
                $users = DB::table('users')
                    ->select(DB::raw("left(ltrim(name), locate(' ', ltrim(name))-1)"))
                    ->distinct()->paginate(10);
                break;
            case 14: //p.12 All users sorted in random order.
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->inRandomOrder()->paginate(10);
                break;
            case 15://p.13 One random
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users [0] = DB::table('users')->inRandomOrder()->first();
                break;
            case 16://p.14 The first thee users with age=30
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', 30)->take(3)->get();
                break;
            case 17://p.15 ten users with age=30 start 3rd
                $columnNames = DB::getSchemaBuilder()->getColumnListing('users');
                $users = DB::table('users')->where('age', '=', 30)->skip(2)->take(10)->get();
                break;
            default: return redirect()->route('homework');
        };
        return view('Pages.user', [
            'title' => 'users-by-query',
            'content' => '<h1>Список користувачів за запитом</h1>',
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
        return view('Users.newUser', [
            'title' => 'admins-all',
            'content' => file_get_contents(__DIR__ . '/../../../resources/Contents/adminsAll.html')
        ]);
    }

    /**
     * Show the specified admin.
     *
     * @param  int $id
     */
    public function showAdmin($id)
    {
        return view('Users.newUser', [
            'title' => 'admin-' . $id,
            'id' => $id,
            'name' => '',
            'content' => '<h1>Інформація про адміністратора:</h1>'
        ]);
    }
}
