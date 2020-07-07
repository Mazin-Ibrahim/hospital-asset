<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssetsTransactions extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $trans;
    public function __construct($trans)
    {
        $this->trans = $trans;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com', 'Mazin')  
                    ->subject('Report About Assets Transactions In Week ' )
                    ->replyTo('admin@gmail.com', 'Reply Address')
                    ->view('Mail.report.assetsTransactions');
    }
}
