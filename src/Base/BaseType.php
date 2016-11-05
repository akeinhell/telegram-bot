<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 27.06.16
 * Time: 11:58
 */

namespace Telegram\Base;


use Illuminate\Support\Collection;

/**
 * https://core.telegram.org/bots/api#available-types
 * Class BaseType
 * @package Telegram\Base
 */
class BaseType
{
    /**
     * @var Collection
     */
    protected $attributes;

    /**
     * @var array
     */
    protected $map = [];

    /**
     * BaseType constructor.
     *
     * @param $attributes
     */
    public function __construct($attributes)
    {
        $this->attributes = $this->build($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return Collection
     */
    private function build(array $attributes = [])
    {
        $map = $this->map;

        return collect($attributes)
            ->mapWithKeys(function ($item, $key) use ($map) {
                if (is_array($item) && $className = array_get($map, $key)) {
                    return new $className($item);
                }

                return $item;
            });
    }

    /**
     * @param $json
     *
     * @return static
     */
    public static function create($json)
    {
        return new static(is_array($json) ? $json : json_decode($json, true));
    }
}