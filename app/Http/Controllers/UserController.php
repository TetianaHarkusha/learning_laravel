<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('Users.newUser', [
            'title' => 'users-all',
            'content' => file_get_contents(__DIR__ . '/../../../resources/Contents/usersAll.html')
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
