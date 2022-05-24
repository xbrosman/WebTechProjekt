<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     * Attach csv file with logs
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail')
            ->attach(storage_path('app/public/webtech_projekt_log.csv'), [
                'as' => 'webtech_projekt_log.csv',
                'mime' => 'text/csv',
            ]);
    }
}
