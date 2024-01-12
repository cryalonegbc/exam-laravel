<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ThingUpdatedNotification extends Notification
{
    use Queueable;

    protected $thing;

    public function __construct($thing)
    {
        $this->thing = $thing;
    }

    public function via($notifiable)
    {
        return ['database']; // Используйте канал 'database' для хранения уведомлений в БД
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Thing ' . $this->thing->name . ' has been updated.',
            'thing_id' => $this->thing->id
        ];
    }
}
