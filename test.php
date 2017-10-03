<?php

require './vendor/autoload.php';

$bot = \Telegram\Bot::create('test');

$x     = $bot->getMe();
$photo = $x->photo;

var_dump($x->toArray());
var_dump($x->toJson());
