<?php

require_once '../../../vendor/autoload.php';

$telegram = new Telegram();

var_dump($telegram->getUpdates());
