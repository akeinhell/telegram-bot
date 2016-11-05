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
    private static $updateData;

    public function setUp()
    {
        $faker            = Faker\Factory::create('ru_RU');
        self::$updateData = [
            'update_id' => $faker->randomNumber,
            'message'   => [
                'message_id' => $faker->randomNumber,
                'from'       => [
                    'id'         => $faker->randomNumber,
                    'first_name' => $faker->firstName,
                    'last_name'  => $faker->lastName,
                    'username'   => $faker->name,
                ],
                'chat'       => [
                    'id'         => $faker->randomNumber,
                    'type'       => $faker->randomElement(['private', 'group', 'supergroup']),
                    'first_name' => $faker->firstName,
                    'last_name'  => $faker->lastName,
                    'username'   => $faker->name,
                ],
                'date'       => $faker->dateTime->getTimestamp(),
                'text'       => $faker->text,
            ],
        ];
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

    /**
     * @expectedException \Telegram\Exceptions\TelegramCoreException
     */
    public function testNotFound()
    {
        $bot = new \Telegram\Bot('101766553:AAFHtQFAMl0-bUtm5zun4CaHTu71Ymy1R50');
        $bot->getState();
    }

    public function testUpdate()
    {
        $update = Update::create(self::$updateData);

        $this->assertNotNull($update->get('message'));
        $this->assertNotNull($update->get('update_id'));
        $this->assertArrayHasKey('update_id', $update->toArray());
        $this->assertArrayHasKey('message', $update->toArray());

        $this->assertNotFalse(json_decode($update->toJson()));
    }

    public function testGetter()
    {
        $update = Update::create(self::$updateData);

        $this->assertEquals(array_get(self::$updateData, 'update_id'), $update->getUpdateId());
        $this->assertEquals(get_class($update->getMessage()), \Telegram\Types\Message::class);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailArgument(){
        Update::create([])->getFailArgument();
    }
}
