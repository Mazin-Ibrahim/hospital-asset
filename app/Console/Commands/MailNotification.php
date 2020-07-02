<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
/* Need to use user app, mail and mailable class "NoticeMail" */
use App\User;  
use App\Asset;
use Mail;
use App\Mail\DangerLevelMail;

class MailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email whene danger_level in asset table = stock';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $users = User::all();

         $emails = [];
         
         foreach ($users as $key => $user) {
           array_push($emails, $user->email);
         }

        $assets = Asset::all();
   
            

         Mail::to($emails)->send(new DangerLevelMail($assets));
         
    }
}
