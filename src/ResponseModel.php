<?php


namespace Telegram;


use Jenssegers\Model\Model;

class ResponseModel extends Model
{
    protected function castAttribute($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        if ($castClass = $this->resolveCastClass($key)) {
            return new $castClass($value);
        }

        switch ($this->getCastType($key)) {
            case 'int':
            case 'integer':
                return (int)$value;
            case 'real':
            case 'float':
            case 'double':
                return (float)$value;
            case 'string':
                return (string)$value;
            case 'bool':
            case 'boolean':
                return (bool)$value;
            case 'object':
                return $this->fromJson($value, true);
            case 'array':
            case 'json':
                return $this->fromJson($value);
            default:
                return $value;
        }
    }

    protected function resolveCastClass($key)
    {
        $className = array_get($this->casts, $key);

        return $className && class_exists($className) ? $className : null;

    }
}