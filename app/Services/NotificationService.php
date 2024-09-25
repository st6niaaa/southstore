<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function notify($status, $title, $duration = 3000)
    {
        Session::flash('notification', [
            'status' => $status,
            'title' => $title,
            'timer' => $duration,
        ]);
    }
}