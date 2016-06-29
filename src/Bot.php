<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 22.06.16
 * Time: 12:03
 */

namespace Telegram;


use GuzzleHttp\Client;
use Telegram\Actions\Message;
use Telegram\Exceptions\TelegramCoreException;

/**
 * Class Bot
 * @package Telegram
 * @method static Message message
 */
class Bot
{
    /**
     * Bot constructor.
     * @param null|string $token
     * @param array       $options
     * @throws TelegramCoreException
     */
    public function __construct($token = null, $options = [])
    {
        $this->token = $token ?: getenv('TELEGRAM_TOKEN');
        if (!$this->token) {
            throw new TelegramCoreException('Token must be defined');
        }
        $baseOptions  = [
            'base_uri' => sprintf('https://api.telegram.org/bot%s/', $token),
        ];
        $this->client = new Client(array_merge($baseOptions, $options));
    }

    public static function __callStatic($name, $arguments)
    {
        $class = '\\Telegram\\Actions\\' . ucfirst($name);
        if (!class_exists($class)) {
            throw new TelegramCoreException('Action ' . $name . ' not exists');
        }

        return new $class;
    }


}