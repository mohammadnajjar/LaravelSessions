<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public  function  index(){

//       get number user
//       $user= User::findorfail(1);
//       return $user->phone->number;

//       get user data
//       $phone= Phone::findorfail(1);
//       return $phone->user->name;

//        $users = User::findorfail(1);
//        return $users->roles;
        $roles = Role::findorfail(2);
        return $roles->users;
   }
}
