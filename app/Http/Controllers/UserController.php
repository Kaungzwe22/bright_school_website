<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_view(){
        return view("admin.users.user_view");
    }
}
