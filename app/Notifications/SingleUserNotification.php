<?php

namespace App\Notifications;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SingleUserNotification extends Notification implements ShouldBroadcast
{
    // use Queueable;


    private array $notificationData;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $notificationData)
    {
        $this->notificationData = $notificationData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        //return ['mail','broadcast'];
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Single User notification")
            ->cc(['abc@gmail.com', 'hello@gmail.com'])
            ->line($this->notificationData['text'])
            ->action('Visit now', $this->notificationData['website'])
            ->line('Thank you for using our application!');
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            'channel' => 'user-notification', // Define your broadcasting channel
            'event' => 'single-user', // Define your event name
            'data' => [
                'user_info' => [
                    'Name' => "Ariful Islam",
                ]
                // Any other data you want to include
            ],
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
