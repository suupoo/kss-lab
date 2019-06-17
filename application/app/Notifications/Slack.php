<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Slack extends Notification
{
    use Queueable;

    protected $content;
    protected $channel;
    protected $name;
    protected $icon = null;

    /**
     * Create a new notification instance.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->channel  = env('SLACK_CHANNEL');
        $this->name     = env('SLACK_NAME');
//        $this->icon     = env('SLACK_ICON');
        $this->content  = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
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

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    ->from($this->name)
//                    ->image($this->icon)
                    ->to($this->channel)
                    ->content($this->content);
    }
}
