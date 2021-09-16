<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // one to one
//       get number user
//        $user = User::findorfail(2);
//        return $user->phone;
//       get user data
//        $phone = Phone::findorfail(1);
//        return $phone->user;
        $users = User::find(1);
        return $users->roles;

    }
}
