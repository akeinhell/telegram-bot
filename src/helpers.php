<?php

if ( ! function_exists('array_get'))
{
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        if (is_null($key)) return $array;

        if (isset($array[$key])) return $array[$key];

        foreach (explode('.', $key) as $segment)
        {
            if ( ! is_array($array) || ! array_key_exists($segment, $array))
            {
                return value($default);
            }

            $array = $array[$segment];
        }

        return $array;
    }
}


if ( ! function_exists('snake_case'))
{
        function snake_case($value, $delimiter = '_')
        {
        	$replace = '$1'.$delimiter.'$2';
        	return ctype_lower($value) ? $value : strtolower(preg_replace('/(.)([A-Z])/', $replace, $value));
        }
}
