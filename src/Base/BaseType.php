<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 27.06.16
 * Time: 11:58
 */

namespace Telegram\Base;


use Telegram\Helpers\AnnotationHelper;

class BaseType
{
    /**
     * BaseType constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        if (!is_array($data)) {
            return $data;
        }
        foreach ($data as $key => $value) {
            $annotatinons = AnnotationHelper::getAnnotations($this, $key);
            if (!property_exists($this, $key)) {
                $this->$key = $value;
                continue;
            }

            if (array_key_exists('var', $annotatinons)) {
                $class = '\\Telegram\\Types\\' . $annotatinons['var'];
                if (class_exists($class)) {
                    /** @var BaseType $class */
                    $this->$key = $class::create($value);
                }
            }
        }
    }

    /**
     * @param $data
     * @return static
     */
    public static function create($data)
    {
        return new static($data);
    }

    /**
     * @param $json
     * @return static
     */
    public static function createFromJson($json)
    {
        return new static(json_decode($json, true));
    }
}