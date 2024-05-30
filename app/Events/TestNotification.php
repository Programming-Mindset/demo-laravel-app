<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Events\BroadcastNotificationCreated;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification implements ShouldBroadcast
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

    public function broadcastOn()
    {
        return 'user-notification';
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'notification';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_data' => [
                'name' => $notifiable->name,
                'email' => $notifiable->email,
            ]
        ];
    }

}
