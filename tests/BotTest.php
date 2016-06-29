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
            'updateId'=>1,
            'message'=>[]
        ]);
        var_dump($update);
    }
}
