<?php

namespace App\Http\Controllers;

use App\Mail\test1;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test(){
      mail::to('mohammadnajjarmalnaj@yahoo.com')->send(new test1);
        dd('send mail ok');
    }
    public function markdown(){
        $email = Auth::user()->email;
        $user=  User::find(Auth::user()->id);
        mail::to($email)->send(new Welcome($user));
        dd('send mail ok');
    }


}
