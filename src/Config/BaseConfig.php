<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 23.09.16
 * Time: 18:17
 */

namespace Telegram\Config;


abstract class BaseConfig
{
    abstract public function get($chatId);

    abstract public function set($chatId, array $params);

    abstract public function getValue($chatId, $value, $default);

    abstract public function setValue($chatId, $key, $value);
}