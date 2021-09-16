<?php

namespace App\Http\Controllers;

use App\Mail\test1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test(){
        mail::to('mohammadnajjar9987m@gmail.com')->send(new test1);
        dd('send mail ok');
    }
}
