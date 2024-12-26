<?php

require_once '../../../vendor/autoload.php';

$telegram = new Telegram();

$telegram->getUpdates();
$telegram->serveUpdate(0);

$res = $telegram->sendMessage([
    'chat_id' => 'adsf',  // Chat not found
    'text'    => 'Hello world',
]);
var_dump($res);
