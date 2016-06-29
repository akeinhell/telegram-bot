<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 13:00
 */

namespace Telegram\Helpers;


class AnnotationHelper
{

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

            $return[$k] = $v;
        }

        return $return;
    }
}