<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //   ! get
   public function index(){

//   ! get all data table name by db class
//       $users=DB::table('users')->get();
//       return $users;

//   ! get all data table name by Model
//       $users=User::all();
//       $users=User::get();
//       return $users;

//   ! get all data table to view
//     $users=DB::table('users')->get();
//     return view('welcome',compact('users'));

//   ! get data for one user
//       $users = DB::table('users')->where('id', 1)->get();
//       return view('welcome',compact('users'));

//    ! get data for one user without foreach -- first
//       $user = DB::table('users')->where('id', 1)->first();
//       return $user->email;

//    ! get data for one user email
//       $user = DB::table('users')->where('id', 1)->value('email');
//       return $user;

//    ! get data for one user email
//       $user = DB::table('users')->where('id', 1)->value('email');
//       return $user;

//    ! get data for one user email with pluck
//       $user = DB::table('users')->where('id', 1)->pluck('id','name');
//       return $user;

//   ! get data for one user with find search used id
//       $users = DB::table('users')->find(1);
//       return $users;
// _______________________________________________________________
   }
    //    ! Insert
    public function insert(){
       // insert one user
//        DB::table('users')->insert([
//            'name' =>'ssss',
//            'email' => 'sssss@example.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make(1234),
//            'remember_token' => Str::random(10),
//        ]);

        // insert Array Row
                DB::table('users')->insert([
                    [
                        'name' =>'mmmm',
                        'email' => 'mmmmmmm@example.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make(1234),
                        'remember_token' => Str::random(10),
                    ],[
                    'name' =>'hoooo',
                    'email' => 'hooooooo@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make(1234),
                    'remember_token' => Str::random(10),]
                ]);
                return "ok";
    }
    //    ! update
    public function update(){
       // update one cloumn =  name when id = 1
//        DB::table('users')->where('id',1)->update([
//            'name' =>'hi',
//        ]);

        DB::table('users')
            ->updateOrInsert([
                // check
                'id'=>1
            ],[
                //value
                    'name' =>'hiiii'
                ]

            );

        return "update";
    }
    public function delete(){
//        delete all users
//        DB::table('users')->delete();
//        return 'delete drop all tables';

//        delete one user when id = 2
//        DB::table('users')->where('id',2)->delete();
//        return 'delete';


//        delete all users and rest id starting 1 by  truncate
//        DB::table('users')->truncate();
//        return 'delete';

    }
}
