<?php


namespace Telegram;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Container\Container;
use Monolog\Logger;
use Telegram\Models\Chat;

/**
 * Class Bot
 * @property-read \Telegram\Api api
 *
 * @package Telegram
 */
class Bot
{
    protected static $instance;
    private          $container;

    public function __construct($providers = null, $inflectors = null, $definitionFactory = null)
    {
        $this->container = Container::getInstance();
        $this->boot();
    }

    public static function create(string $token)
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return new static();
    }

    private function boot()
    {
        $this->container->bind('api', Api::class);
        $this->container->bind(Logger::class, function () {
            return new Logger('bot');
        });
        $this->container->bind(GuzzleClient::class, function (Container $container) {
            $stack = HandlerStack::create();

            $logger    = $container->make(Logger::class);
            $formatter = new MessageFormatter('[{code}] {method} {uri}');
            $stack->push(Middleware::log($logger, $formatter));

            $token = '148482624:AAF54IVU0zSvvccB2YEQyU1_sH220rLX1oY';

            return new GuzzleClient(
                [
                    'base_uri' => 'https://api.telegram.org/bot' . $token . '/',
                    'handler'  => $stack,
                ]
            );
        });
    }

    public function getMe()
    {
        /** @var Api $api */
        $api = $this->container->get('api');

        return new Chat($api->call('getChat', ['chat_id' => '94986676']));
    }
}
