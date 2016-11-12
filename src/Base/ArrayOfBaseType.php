<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 1:39
 */

namespace Telegram\Base;


use Illuminate\Support\Collection;

class ArrayOfBaseType
{
    protected $baseType;
    /**
     * @var Collection
     */
    private $array;

    /**
     * ArrayOfBaseType constructor.
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $baseType    = $this->baseType;
        $this->array = collect($array)
            ->map(function ($item) use ($baseType) {
                return new BaseType($item);
            });
    }


}