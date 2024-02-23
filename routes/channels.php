<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/



Broadcast::channel('Messenger.{id}', function($user,$id){
    if ($user->id == $id) {
        return $user;
    }
    return false;
}, ['guards' => ['web', 'admin']]);


