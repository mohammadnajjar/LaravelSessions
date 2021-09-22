<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class expiration extends Command
{

    protected $signature = 'user:expire';


    protected $description = 'expire user every 5 min automatically';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('expire',0)->get();
       foreach ($users as $user){
           $user -> update(['expire' => 1]);
       }
    }
}
