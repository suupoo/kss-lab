<?php

namespace App\Notifications;

use Illuminate\Support\Facades\View;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    protected $title = "月間報告";

    protected $slackChannel;
    protected $slackName;
    protected $content;

    protected $isMarkdown=true;
    protected $viewMarkdown = "mail.invoice.paid";
    
    /**
     * Create a new notification instance.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->slackChannel  = env('SLACK_CHANNEL');
        $this->slackName     = env('SLACK_NAME');
        $this->content       = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
            ->subject($this->title);
        //Use Markdown
        if($this->isMarkdown && View::exists($this->viewMarkdown))
            $mailMessage->markdown($this->viewMarkdown);

        else
            //Normal Email
            $mailMessage
                ->line('1行目')
                ->action('送信元', url('/'))
                ->line($this->content);

        return $mailMessage;
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from($this->slackName)
            ->to($this->slackChannel)
            ->content($this->content);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
