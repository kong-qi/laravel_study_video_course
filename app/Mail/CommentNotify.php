<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $comment;
    public  $article;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comment,$article)
    {
        $this->comment=$comment;
        $this->article=$article;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.comment');
    }
}
