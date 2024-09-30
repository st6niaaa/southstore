<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Longman\TelegramBot\Telegram;
use Longman\TelegramBot\Request as RequestTelegram;

class telegramController extends Controller
{
    public static function message($tlgmessage)
    {
        $bot = new Telegram('5657449818:AAGdxrR0f9cCkqnsMl-bt-OXE4FsxM4Rto8');

        // Replace 'CHANNEL_USERNAME' with the actual channel username and 'YOUR_MESSAGE' with the message you want to send
        $result = RequestTelegram::sendMessage([
            'chat_id' => '@testesst6',
            'text' => $tlgmessage,
        ]);
    }
}
