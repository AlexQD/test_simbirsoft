<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class URLFile extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_hash;
    protected $file_hash;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_hash,$file_hash)
    {
        $this->user_hash = $user_hash;
        $this->file_hash = $file_hash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test-project-laravel2@yandex.ru')->view('emails.URLFile')
            ->with(['user_hash'=>$this->user_hash,'file_hash'=>$this->file_hash]);
    }
}
