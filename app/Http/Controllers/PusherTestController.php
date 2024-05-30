<?php

namespace App\Http\Controllers;

use App\Notifications\MultipleUserNotification;
use App\Notifications\SingleUserNotification;
use Illuminate\Support\Facades\Notification;

class PusherTestController
{
    public function singleUser()
    {
        $user = \App\Models\User::first();
        $notificationData = [
            'text' => fake()->realText,
            'website' => fake()->url,
            'location' => fake()->city(),
        ];
        $user->notify(new SingleUserNotification($notificationData));
    }

    public function multiUser()
    {

        $users = \App\Models\User::all();
        $notificationData = [
            'text' => fake()->realText,
            'website' => fake()->url,
            'location' => fake()->city(),
        ];
        Notification::send($users, new MultipleUserNotification($notificationData));
    }

    public function viewPage()
    {
        return view('page');
    }
}
