<?php

namespace App\Listeners;

use App\Events\AssetDangerLevel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\DangerLevelMail;
use Mail;

class SendEamilAssetDangerLevel
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AssetDangerLevel  $event
     * @return void
     */
    public function handle(AssetDangerLevel $event)
    {

         // $data = [
         //  'emails'  => $event->users,
         //  'assets'  => $event->assets
         // ];

        // dd($event->users);

          Mail::to($event->users)->send(new DangerLevelMail($event->asset_name));
    }
}
