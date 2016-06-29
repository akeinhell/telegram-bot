<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 13:00
 */

namespace Telegram\Helpers;

use Jasny;


class AnnotationHelper
{
    private static $map = [
        'required' => 'boolean',
        'type'     => 'string',
    ];

    public static function getAnnotations($class, $value)
    {
        $propertyReflect = new \ReflectionProperty($class, $value);
        $doc             = $propertyReflect->getDocComment();
        if (!preg_match_all('#@(.*?)\n#s', $doc, $annotations)) {
            return false;
        };
        $annotations = $annotations[1];
        $return      = [];
        foreach ($annotations as $annotation) {
            list($k, $v) = array_pad(explode(' ', $annotation, 2), 2, null);
            if (array_key_exists($k, static::$map)) {
                $type = static::$map[$k];
                $v    = Jasny\TypeCast::value($v)->to($type);
            }

            $return[$k] = $v;
        }

        return $return;
    }
}