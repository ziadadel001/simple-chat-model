<?php

use Illuminate\Support\Facades\Broadcast;

// Define a broadcast channel named 'messages'
Broadcast::channel('messages', function ($user) {
    // Allow all authenticated users to listen to this channel
    return true;
});
