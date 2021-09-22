<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{

    protected $signature = 'Notify:email';

    protected $description = 'Notify';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
//        $users = User::where('expire',0)->get();
        // $user = User::select('email')->get();
        $emails = User::pluck('email')->toArray();
        $data=['title'=> 'progrmming' , 'body' => 'php'];
        foreach($emails as $email){
            Mail::To($email) ->send(new NotifyEmail($data));
        }
    }
}
