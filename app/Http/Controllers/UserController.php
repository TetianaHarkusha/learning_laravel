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
        return 'Користувач ' . (is_numeric($id) ? '(id=' . $id .')' : $id) . ' ' . $name;
    }

    /**
     * Show all users
     */
    public function showAll()
    {
        return 'Список всіх користувачів.';
    }

     /**
     * Show all users-admins
     */
    public function showAdminAll()
    {
        return 'Список адміністраторів.';
    }

    /**
     * Show the specified admin.
     *
     * @param  int $id
     */
    public function showAdmin($id)
    {
        return 'Адміністратор (користувач id=' . $id .').';
    }
}
