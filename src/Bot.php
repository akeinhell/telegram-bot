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
use Telegram\Config\BaseConfig;
use Telegram\Exceptions\TelegramCoreException;
use Telegram\Methods\GetMe;
use Telegram\Types\User;

/**
 * Class Bot
 * @package Telegram
 */
class Bot
{
    /**
     * @var mixed
     */
    private $state;
    /**
     * @var BaseConfig
     */
    private $config;

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

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    public function message()
    {
        return new Message();
    }

    /**
     * @return User
     */
    public function getMe()
    {
        $method = new GetMe($this);

        return $method();
    }

    public function send($method, $params = [])
    {
        $response = $this->client->post($method, ['body_params' => $params])->getBody()->__toString();
        $data     = json_decode($response, true);

        return new User($data['result']);
    }

    public function setConfig(BaseConfig $config)
    {
        $this->config = $config;
    }
}