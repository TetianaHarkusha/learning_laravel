<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
        $columnNames[0] = DB::getSchemaBuilder()->getColumnListing('users');
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

        return view('Pages.User.user', [
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
        $columnNames[0] = DB::getSchemaBuilder()->getColumnListing('users');

        //all table rows with pagination
        $users = DB::table('users')->paginate(10);

        return view('Pages.User.user', [
            'title' => 'users-all',
            'topic' => 'Список користувачів:',
            'columnNames' => $columnNames,
            'users' => $users,
        ]);
    }

    /**
     * Show one user with relationships for lesson10 p.15
     */
    public function showOneWithCityAndPosition()
    {
        $user = User::inRandomOrder()->first();
        $columnNames [0]= array_keys($user->getAttributes());
        $columnNames['city'] = ['name'];
        $columnNames['position'] = ['name'];

        return view('Pages.User.user-one', [
            'title' => 'user-with-city-and-position',
            'topic' => 'Інформація про користувача (з містом та позицією):',
            'columnNames' => $columnNames,
            'user' => $user,
        ]);
    }

    /**
     * Show all user with relationships for lesson10 p.15
     */
    public function showAllWithCityAndPosition()
    {
        $users = User::paginate(10);
        $columnNames [0]= array_keys(User::first()->getAttributes());
        $columnNames['city'] = ['name'];
        $columnNames['position'] = ['name'];

        return view('Pages.User.user', [
            'title' => 'users-with-city-and-position',
            'topic' => 'Список користувачів (з містом та позицією):',
            'columnNames' => $columnNames,
            'users' => $users,
        ]);
    }

    /**
     * Show all user with relationships by query for lesson10 p.15
     */
    public function showWithCityAndPositionQuery($id)
    {
        $users = User::paginate(10);
        $columnNames [0]= array_keys(User::first()->getAttributes());
        $columnNames['city'] = ['name'];
        $columnNames['position'] = ['name'];

        switch ($id) {
            case 1://Users with age between 20 and 30
                $users = User::whereBetween('age', [20, 30])->paginate(10);
                break;
            case 16://Users with age between 20 and 30
                $users = User::where('age', 30)->take(3)->get();
                break;
        };

        return view('Pages.User.user', [
            'title' => 'users-with-city-and-position',
            'topic' => 'Список користувачів за запитом (з містом та позицією):',
            'columnNames' => $columnNames,
            'users' => $users,
            'id' =>$id,
        ]);
    }

    /**
     * Show  users by queries in lesson7 (using facade DB)
     */
    public function showByQuery($id)
    {
        //all column names of table 'user' in array
        $columnNames[0] = DB::getSchemaBuilder()->getColumnListing('users');
        switch ($id) {
            case 1://p.2 All records from table 'user'
                $users = DB::table('users')->paginate(10);
                break;
            case 2://p.4 Only columns 'name' and 'email'
                $columnNames[0] = ['name', 'email'];
                $users = DB::table('users')->select('name', 'email')->paginate(10);
                break;
            case 3://p.5 Rename column 'email' to 'user_email'
                $columnNames[0] = ['name', 'user_email'];
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
                $columnNames[0] = ['name'];
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
            default: return redirect()->route('homework.list');
        };
        return view('Pages.User.user', [
            'title' => 'users-by-query',
            'topic' => 'Список користувачів за запитом:',
            'columnNames' => $columnNames,
            'users' => $users,
            'id' => $id,
        ]);
    }

    /**
     * Show  users by queries in lesson8 (using model User)
     */
    public function showByEloquent($id)
    {
        //all column names of table 'user' in array
        $user = User::firstOrFail()->getAttributes();
        $columnNames[0] = array_keys($user);
        switch ($id) {
            case 1://p.2 All records from table 'user'
                $users = User::paginate(10);
                break;
            case 2://p.4 Only columns 'name' and 'email'
                $columnNames[0] = ['name', 'email'];
                $users = User::select('name', 'email')->paginate(10);
                break;
            case 3://p.5 Rename column 'email' to 'user_email'
                $columnNames[0] = ['name', 'user_email'];
                $users = User::select('name', 'email as user_email')->paginate(10);
                break;
            case 4://p.6 Users with age = 30
                $users = User::where('age', 30)->paginate(10);
                break;
            case 5://p.6 Users with age <> 30
                $users = User::where('age', '<>', 30)->paginate(10);
                break;
            case 6://p.6 Users with age > 30
                $users = User::where('age', '>', 30)->paginate(10);
                break;
            case 7://p.6 Users with age < 30
                $users = User::where('age', '<', 30)->paginate(10);
                break;
            case 8://p.6 Users with age <= 30
                $users = User::where('age', '<=', 30)->paginate(10);
                break;
            case 9://p.7 Users with age between 20 and 30
                $users = User::whereBetween('age', [20, 30])->paginate(10);
                break;
            case 10://p.8 Users with age=30 or salary=500 or id>4
                $users = User::where('age', 30)->orWhere('salary', 500)->orWhere('id', '>', 4)->paginate(10);
                break;
            case 11://p.9 Users with age between 20 and 30 or salary between 400 and 800
                $users = User::whereBetween('age', [20, 30])->orWhereBetween('salary', [400, 800])->paginate(10);
                break;
            case 12://p.10 Users without age between 30 and 40 order by 'salary' decrease
                $users = User::whereNotBetween('age', [30, 40])->orderByDesc('salary')->paginate(10);
                break;
            case 13://p.11 Collection of names.
                $columnNames[0] = ['name'];
                $users = User::select(User::raw("left(ltrim(name), locate(' ', ltrim(name))-1) as name"))
                    ->distinct()->paginate(10);
                break;
            case 14: //p.12 All users sorted in random order.
                $users = User::inRandomOrder()->paginate(10);
                break;
            case 15://p.13 One random
                $users[] = User::inRandomOrder()->first();
                break;
            case 16://p.14 The first thee users with age=30
                $users = User::where('age', 30)->take(3)->get();
                break;
            case 17://p.15 ten users with age=30 start 3rd
                $users = User::where('age', '=', 30)->skip(2)->take(10)->get();
                break;
            default: return redirect()->route('homework.list');
        };
        return view('Pages.User.user', [
            'title' => 'users-by-query',
            'topic' => 'Список користувачів за запитом:',
            'columnNames' => $columnNames,
            'users' => $users,
            'id' => $id,
        ]);
    }
    /**
     * Show the form for creating a new user.
     *
     */
    public function create()
    {
        return view('Pages.User.user-form', [
            'title' => 'create-user',
            'topic' => 'Форма для створення нового користувача:',
            'user' => '',
            'action' => 'user.store',
        ]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     */
    public function store(Request $req)
    {
        $user = User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'age' => $req->input('age'),
            'salary' => $req->input('salary')
        ]);
        return redirect()->route('user.id', ['id' => $user->id]);
    }

    /**
     * Show the form for editing one random user
     *
     */
    public function edit()
    {
        $user = User::inRandomOrder()->first();
        return view('Pages.User.user-form', [
            'title' => 'update-user',
            'topic' => 'Форма для зміни користувача:',
            'user' => $user,
            'action' => 'user.update',
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests $req
     */
    public function update(Request $req)
    {
        $user = User::find($req->input('id'))->update([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'age' => $req->input('age'),
            'salary' => $req->input('salary')
        ]);
        return redirect()->route('user.id', ['id' => $req->input('id')]);
    }

    /**
     * Deleted users from storage by queries for lesson8.
     *
     */
    public function destroy($id)
    {
        switch ($id) {
            case 1://p.8 Remove all users over 30 from the table.
                $deleted = User::where('age', '>', 30)->forceDelete();
                break;
            case 2://p.9 Remove users with id 4,5,6.
                $deleted = User::whereIn('id', [4, 5, 6])->forceDelete();
                break;
            case 3://p.10 Soft deletion for users
                $deleted = User::where('age', '>', 20)->delete();
                break;
            default: return redirect()->route('homework.list');
        };
        return redirect()->route('homework.list');
    }

    /**
     * Restored soft deleted users from storage.
     *
     */
    public function restore()
    {
        $restored = User::withTrashed()->restore();
        return redirect()->route('user.all');
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
