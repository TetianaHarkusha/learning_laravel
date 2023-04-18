<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDouble;
use App\Models\Profile;

class UserDoubleController extends Controller
{
    /**
     * Show one user with relationships for lesson10 p.3
     */
    public function showOneWithProfile()
    {
        $user = UserDouble::inRandomOrder()->first();
        $columnNames [0]= array_keys($user->getAttributes());
        $columnNames['profile'] = array_keys(Profile::firstOrFail()->getAttributes());

        return view('Pages.User.user-one', [
            'title' => 'user-with-profile',
            'topic' => 'Інформація про користувача  (з профайлом):',
            'columnNames' => $columnNames,
            'user' => $user,
        ]);
    }

    /**
     * Show all users with relationships for lesson10 p.4
     */
    public function showAllWithProfiles()
    {
        $user = UserDouble::first();
        $columnNames [0]= array_keys($user->getAttributes());
        $columnNames['profile'] = ['id', 'name', 'surname', 'email'];
        $users = UserDouble::with('profile')->paginate(10);

        return view('Pages.User.user', [
            'title' => 'users-with-profiles',
            'topic' => 'Інформація про користувачів (з профайлами):',
            'columnNames' => $columnNames,
            'users' => $users,
        ]);
    }
}
