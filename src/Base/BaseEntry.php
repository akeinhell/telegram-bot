<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 11:37
 */

namespace Telegram\Base;


use Illuminate\Support\Collection;

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

    public function get($key, $default = null)
    {
        return $this->attributes->get($key, $default);
    }

    public function toArray()
    {
        return $this->attributes
            ->mapWithKeys(function ($item, $key) {
                return $item instanceof Collection || get_parent_class($item) === BaseEntry::class?
                    [$key => $item->toArray()] :
                    [$key => $item];
            })
            ->toArray();
    }


    public static function create()
    {
        return new static();
    }

}