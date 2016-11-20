<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 22.06.16
 * Time: 12:03
 */

namespace Telegram;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Telegram\Config\BaseConfig;
use Telegram\Entry\MessageEntry;
use Telegram\Exceptions\TelegramCoreException;
use Telegram\Types\Message;
use Telegram\Types\User;

/**
 * Class Bot
 * @package Telegram
 */
class Bot
{
    /**
     * @var Bot
     */
    private static $instance;

    /**
     * @var string
     */
    private $token;

    /**
     * Bot constructor.
     *
     * @param null|string $token
     * @param array $options
     *
     * @throws TelegramCoreException
     */
    public function __construct($token = null, $options = [])
    {
        $this->token = $token ?: getenv('TELEGRAM_TOKEN');
        if (!$this->token) {
            throw new TelegramCoreException('Token must be defined');
        }
        $baseOptions  = [
            'base_uri'    => sprintf('https://api.telegram.org/bot%s/', $token),
            'verify'      => false,
            'http_errors' => false,
        ];
        $this->client = new Client(array_merge($baseOptions, $options));
    }

    /**
     * @param string $method
     * @param array $params
     *
     * @return array
     */
    public function call($method, $params = [])
    {
        $response = $this->prepareResponse($this->client
            ->post($method, [
                'form_params' => $params,
            ]));

        return $this->buildResponse(array_get($response, 'result', []));
    }

    public function __call($name, $arguments)
    {
        return $this->call($name, $arguments);
    }

    private function prepareResponse(ResponseInterface $response)
    {
        $json = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        if (array_get($json, 'ok') == false) {
            throw new TelegramCoreException(array_get($json, 'description', 'error') . array_get($json, 'error_code'),
                array_get($json, 'error_code'));
        }

        return $json;
    }

    private function buildResponse(array $response)
    {
        return $response;
    }

    public function getMe()
    {
        return new User($this->call('getMe'));
    }

    /**
     * @param MessageEntry $message
     * @return Message
     */
    public function sendMessage(MessageEntry $message): Message
    {
        return new Message($this->call('sendMessage', $message->toArray()));
    }

    public function sendTextMessage($to, $text)
    {
        return $this->sendMessage(MessageEntry::create()
            ->to($to)
            ->text($text));
    }

    public function testCall()
    {
        $replyMarkup = [
            'keyboard' => [
                ["A", "B"],
            ],
        ];

        return $this->call('sendMessage', [
            'chat_id'      => \MessagesTest::CHAT_ID,
            'text'         => 'test',
            'reply_markup' => json_encode($replyMarkup),
        ]);
    }
}