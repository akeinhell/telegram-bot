<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 27.06.16
 * Time: 11:58
 */

namespace Telegram\Base;


use Carbon\Carbon;
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
                $keyData = array_get($map, $key);
                if (is_callable($keyData)) {
                    return [$key => call_user_func($keyData, $item)];
                }

                if (class_exists($keyData)) {
                    return [$key => new $keyData($item)];
                }

                return [$key => $item];
            });
    }

    /**
     * @param array|string $json
     *
     * @return static
     */
    public static function create($json)
    {
        return new static(is_array($json) ? $json : json_decode($json, true));
    }

    /**
     * @param string $key
     */
    public function get($key)
    {
        return $this->attributes->get($key);
    }

    public function toArray()
    {
        return $this->attributes
            ->mapWithKeys(function ($item, $key) {
                if (is_subclass_of($item, BaseType::class)) {
                    /** @var BaseType $item */
                    return [$key => $item->toArray()];
                }

                if (is_object($item) && (get_class($item) === Carbon::class)) {
                    /** @var $item Carbon */
                    return [$key => $item->timestamp];
                }

                return [$key => $item];
            })
            ->toArray();
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function __call($name, $arguments)
    {
        $prefix   = substr($name, 0, 3);
        $property = snake_case(substr($name, 3));
        if ($prefix === 'get' && $this->attributes->has($property)) {
            return $this->get($property);
        }
        throw new \InvalidArgumentException();
    }
}