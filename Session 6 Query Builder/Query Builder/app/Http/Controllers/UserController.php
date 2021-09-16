<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
//      Query Builder

//      get all element from table
//      $users = DB::table('users')->get();
//      return view('welcome',compact('users'));

//      eloquent
//      $users= User::all();
//      $users= User::get();
//      return view('welcome',compact('users'));

//      get data one user
//      $users = DB::table('users')->where('name', "Grover Fahey")->get();
//      $users = DB::table('users')->where('id', 1)->get();
//      return view('welcome',compact('users'));

//      get data one user first
//      $user = DB::table('users')->where('id', 1)->first();
//      return $user->email;

//      get data one user value
//      $user = DB::table('users')->where('id', 1)->value("email");
//      return $user;

//      get data one user pluck
//     $user = DB::table('users')->where('id', 1)->pluck("email");
//     return $user;

//     get data one user find
        $users = DB::table('users')->find(1);
       return $users;
    }
    // inser one row
    public function insert(){
        DB::table('users')->insert([
            'name' => 'Mohammad',
            'email' => 'kayla@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456),
            'remember_token' => Str::random(10),
        ]);
        return "ok";
    }
}
