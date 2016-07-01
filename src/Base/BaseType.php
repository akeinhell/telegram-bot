<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 27.06.16
 * Time: 11:58.
 */
namespace Telegram\Base;

use Telegram\Helpers\AnnotationHelper;

/**
 * https://core.telegram.org/bots/api#available-types
 * Class BaseType.
 */
class BaseType
{
    /**
     * BaseType constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        if (!is_array($data)) {
            return $data;
        }
        foreach ($data as $key => $value) {
            $key = $this->toCamelCase($key);
            $annotatinons = AnnotationHelper::getAnnotations($this, $key);

            if ($annotatinons && array_key_exists('var', $annotatinons)) {
                $class = '\\Telegram\\Types\\'.$annotatinons['var'];
                if (class_exists($class)) {
                    /* @var BaseType $class */
                    $this->$key = $class::create($value);
                    continue;
                }
            }

            if (property_exists($this, $key)) {
                $this->$key = $value;
                continue;
            }
        }
    }

    /**
     * @param $key
     *
     * @return string
     */
    private function toCamelCase($key)
    {
        return lcfirst(implode(array_map(function ($part) {
            return ucfirst($part);
        }, explode('_', $key))));
    }

    /**
     * @param $data
     *
     * @return static
     */
    public static function create($data)
    {
        return new static($data);
    }

    /**
     * @param $json
     *
     * @return static
     */
    public static function createFromJson($json)
    {
        return new static(json_decode($json, true));
    }
}
