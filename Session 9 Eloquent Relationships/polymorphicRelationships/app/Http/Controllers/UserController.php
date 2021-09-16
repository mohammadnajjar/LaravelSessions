<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *  One To One (Polymorphic)
     * Get the user's image.
     */
    public function index(){
        $user = User::find(1)->image;
        return $user;
    }
}
