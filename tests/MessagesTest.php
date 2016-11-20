<?php


use Telegram\Bot;
use Telegram\Entry\KeyboardButtonEntry;
use Telegram\Entry\MessageEntry;
use Telegram\Entry\ReplyKeyboardEntry;

class MessagesTest extends PHPUnit_Framework_TestCase
{
    const CHAT_ID = 94986676;

    /**
     * @var Faker\Generator
     */
    private $faker;
    /**
     * @var Bot
     */
    private $bot;

    public function setUp()
    {
        $this->faker = Faker\Factory::create('ru_RU');
        $this->bot   = new Bot('101766553:AAFHtQFAMl0-bUtm5zun4CaHTu71Ymy1R50');
    }

    public function testSendMessage()
    {
        $message = MessageEntry::create()
            ->to(self::CHAT_ID)
            ->text($this->faker->text);
        $this->assertNotEmpty($message->get('text'));
        $result = $this->bot->sendMessage($message);
        $this->assertEquals($result->getFrom(), $this->bot->getMe());
    }

    public function testKeyboard()
    {
        $keyboard = ReplyKeyboardEntry::create()
            ->addRow([KeyboardButtonEntry::create('first_line_1'), KeyboardButtonEntry::create('first_line_2')])
            ->addRow([KeyboardButtonEntry::create('contact', true)])
            ->addRow([KeyboardButtonEntry::create('location', false, true)])
            ->setResizeKeyboard(true)
            ->setSelective(false)
            ->setOneTimeKeyboard(true);

        /** @var MessageEntry $message */
        $message = MessageEntry::create()
            ->text($this->faker->text)
            ->to(self::CHAT_ID)
            ->withReplyKeyboard($keyboard);

        $this->bot->sendMessage($message);

        $message->hideReplyKeyboard();
        $this->bot->sendMessage($message);

        $this->bot->sendTextMessage(self::CHAT_ID, $this->faker->text);
    }

}