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
        Update::create([
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
    }

    /**
     * @expectedException \Telegram\Exceptions\TelegramCoreException
     */
    public function testNullTokenBot()
    {
        new \Telegram\Bot();
    }

    public function testAbout()
    {
        $bot     = new \Telegram\Bot('101766553:AAFHtQFAMl0-bUtm5zun4CaHTu71Ymy1R50');
        $botInfo = $bot->getMe();
        $this->assertNotNull($botInfo);
        $this->assertEquals(get_class($botInfo), \Telegram\Types\User::class);
    }

    public function testState()
    {
        $bot = new \Telegram\Bot('101766553:AAFHtQFAMl0-bUtm5zun4CaHTu71Ymy1R50');
        $bot->getState();
    }
}
