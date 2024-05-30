<?php

use App\Events\TestNotification;
use App\Models\User;
use App\Notifications\MultipleUserNotification;
use App\Notifications\SingleUserNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/page', [\App\Http\Controllers\PusherTestController::class, 'viewPage']);
Route::get('/single-user-no', [\App\Http\Controllers\PusherTestController::class, 'singleUser']);
Route::get('/multi-user-no', [\App\Http\Controllers\PusherTestController::class,'multiUser']);
Route::get('/hello', function (){
   // event(new TestNotification('This is testing data'));
    $users = User::all()->take(1);
    Notification::send($users, new TestNotification($users));

});


Route::get('/box', [\App\Http\Controllers\ChatController::class,'box']);
Route::get('/box/color-changer', [\App\Http\Controllers\ChatController::class,'colorChanger']);
