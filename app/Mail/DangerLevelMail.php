<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DangerLevelMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $asset_name;
    public function __construct($asset_name)
    {
        
        $this->asset_name = $asset_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()  

    {
        return $this->from('admin@gmail.com', 'Mazin')  
                    ->subject('Danger Level asset' )
                    ->replyTo('admin@gmail.com', 'Reply Address')
                    ->view('Mail.eventMail');
    }
}
