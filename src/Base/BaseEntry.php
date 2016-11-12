<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 11:37
 */

namespace Telegram\Base;


class BaseEntry
{
    protected $attributes;

    /**
     * BaseEntry constructor.
     */
    public function __construct()
    {
        $this->attributes = collect();
    }

    protected function set($key, $value)
    {
        $this->attributes->put($key, $value);

        return $this;
    }

    protected function get($key, $default = null)
    {
        return $this->attributes->get($key, $default);
    }

    public function toArray()
    {
        return $this->attributes->toArray();
    }
}