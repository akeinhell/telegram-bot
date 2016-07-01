<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 22.06.16
 * Time: 12:03.
 */
namespace Telegram;

use GuzzleHttp\Client;
use Telegram\Actions\Message;
use Telegram\Exceptions\TelegramCoreException;
use Telegram\Methods\GetMe;
use Telegram\Types\User;

/**
 * Class Bot.
 */
class Bot
{
    /**
     * Bot constructor.
     *
     * @param null|string $token
     * @param array       $options
     *
     * @throws TelegramCoreException
     */
    public function __construct($token = null, $options = [])
    {
        $this->token = $token ?: getenv('TELEGRAM_TOKEN');
        if (!$this->token) {
            throw new TelegramCoreException('Token must be defined');
        }
        $baseOptions = [
            'base_uri' => sprintf('https://api.telegram.org/bot%s/', $token),
        ];
        $this->client = new Client(array_merge($baseOptions, $options));
    }

    public function message()
    {
        return new Message();
    }

    public function getMe()
    {
        $method = new GetMe($this);

        return $method();
    }

    public function send($method, $params = [])
    {
        $response = $this->client->post($method, ['body_params' => $params])->getBody()->__toString();
        $data = json_decode($response, true);
        var_dump($data['result']);

        return new User($data['result']);
    }
}
