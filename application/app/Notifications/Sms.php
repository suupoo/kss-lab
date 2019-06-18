<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\NexmoMessage;

class Sms extends Notification
{
    use Queueable;

    protected $content;
    protected $from;
    protected $unicode;

    /**
     * Create a new notification instance.
     *
     * @param $content
     * @param null $from 電話番号
     * @param bool $unicode Unicodeが含まれるかどうか
     */
    public function __construct($content,$from = null,$unicode = true)
    {
        $this->content = $content;
        $this->from = $from;
        $this->unicode = $unicode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
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

    /**
     * SMSを送信します
     *
     * @param $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        $nexmoMessage = (new NexmoMessage)
            ->content($this->content);

        if($this->from)
            $nexmoMessage->from($this->from);
        if($this->unicode)
            $nexmoMessage->unicode();

        return $nexmoMessage;
    }
}
