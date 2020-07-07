<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use App\Mail\AssetsTransactions;
use App\User;
use Carbon\Carbon;
use Mail;

class SendEmailWeeklyAboutAssetsTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets_transactions:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command send email to all users and show all transactions assets';

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

    $date = Carbon::today()->subDays(7);

    $trans = Transaction::whereBetween('date', [$date, Carbon::today()])->orderBy('date', 'desc')->get();

     Mail::to($emails)->send(new AssetsTransactions($trans));
 }
}
