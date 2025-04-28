<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Blog;
use App\Http\Controllers\CommentControllers;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $blog;
    
    public function __construct($blog)
    {
        $this->blog=$blog;
    }

    public function build()
    {
        return $this->view('mail.subscriber_mail',[
            'blog'=>$this->blog
        ]);
    }
}
