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

        if (!is_numeric($id)) {
            ${($name == '') ? 'name' : 'surname'} = $id;
            unset($id);
        }

        return view('Users.user', [
            'title' => $title,
            'id' => $id??'',
            'name' => $name??'',
            'surname' => $surname??'']);
    }

    /**
     * Show all users
     */
    public function showAll()
    {
        return view('Users.usersAll');
    }

     /**
     * Show all users-admins
     */
    public function showAdminAll()
    {
        return view('Users.adminsAll');
    }

    /**
     * Show the specified admin.
     *
     * @param  int $id
     */
    public function showAdmin($id)
    {
        return view('Users.admin', ['id' => $id,]);
    }
}
