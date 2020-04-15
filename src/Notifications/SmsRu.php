<?php

namespace CodersStudio\SmsRu\Notifications;

use CodersStudio\SmsRu\Channels\SmsRuChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SmsRu extends Notification
{
    use Queueable;

    public string $phone;
    public string $message;

    /**
     * Create a new notification instance.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsRuChannel::class];
    }


    /**
     * Get the sms representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toSms($notifiable)
    {
        return $this->toArray($notifiable);
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
            'phone' => $notifiable->phone,
            'message' => $this->message
        ];
    }
}
