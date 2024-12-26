<?php

namespace App\Helpers;

use App\Telegram\Telegram as TelegramBot;
use stdClass;

class telegram
{
    public static function getMe()
    {
        // $telegram = new TelegramBot();
        // $me = $telegram->getMe();
        $bot = new stdClass;
        // $bot->first_name = $me['result']['first_name'] ?? '';
        // $bot->username = $me['result']['username'] ?? '';

        $bot->first_name = 'savalan';
        $bot->username = 'bot';
        return $bot;
    }
}
