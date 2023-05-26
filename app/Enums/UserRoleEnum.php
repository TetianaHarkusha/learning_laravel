<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'administrator';
    case EDITOR = 'editor';
    case USER = 'user';
}