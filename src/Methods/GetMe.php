<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 30.06.16
 * Time: 15:14
 */

namespace Telegram\Methods;


use Telegram\Base\BaseMethod;
use Telegram\Bot;

class GetMe extends BaseMethod
{
    /**
     * @var Bot
     */
    private $botInstance;

    /**
     * GetMe constructor.
     * @param $botInstance
     */
    public function __construct(&$botInstance)
    {
        $this->botInstance = &$botInstance;
    }

    public function __invoke()
    {
        return $this->botInstance->send('getMe', []);
    }
}