<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user_names = [];
        $users = User::all();
        foreach ($users as $user) {
            $user_names[] = $user->name;
        }
        return view('admin.users.index', compact('user_names'));
    }
}
