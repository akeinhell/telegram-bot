<?php
use Telegram\Types\Update;

/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 22.06.16
 * Time: 12:10
 */
class BotTest extends PHPUnit_Framework_TestCase
{
    public function testBase(){
        $update = Update::create([
            'update_id' => 123456,
            'message' => [
                'message_id' => 13948,
                'from' => [
                    'id' => 123,
                    'first_name' => 'Ilya',
                    'last_name' => 'Gusev',
                    'username' => 'iGusev',
                ],
                'chat' => [
                    'id' => 123,
                    'type' => 'private',
                    'first_name' => 'Ilya',
                    'last_name' => 'Gusev',
                    'username' => 'iGusev',
                ],
                'date' => 1440169809,
                'text' => 'testText',
            ],
        ]);
        var_dump($update);
    }
}
