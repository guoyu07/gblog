<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * 测试邮件--
 *
 * 若要邮件发送时放入队列，只需实现ShouldQueue接口，默认使用
 * mark:mail 时不会实现ShouldQueue接口，(在使用队列之前，先配
 * 置好你的队列)
 * 
 * 
 */
class UserRegisterd extends Mailable implements ShouldQueue
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
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('这是主题')
                    ->markdown('emails.userRegisterd.shipped');
        // return $this->view('view.name');
    }
}
