<?php

use App\DailySells;
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

Broadcast::channel('customer.{customer_id}', function ($user, $customer_id) {
    return (int) $user->id === (int) $customer_id;
});



