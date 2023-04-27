<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Show all profiles with relationships for lesson10 p.6
     */
    public function showAllWithUsers()
    {
        $profile = Profile::first();
        $columnNames [0]= array_keys($profile->getAttributes());
        $columnNames['user'] = ['login', 'password'];
        $profiles = Profile::paginate(10);

        return view('Pages.User.user', [
            'title' => 'profiles-with-users',
            'topic' => 'Інформація  з профайлів користувачів (доповнена таблицею users):',
            'columnNames' => $columnNames,
            'users' => $profiles,
        ]);
    }
}
