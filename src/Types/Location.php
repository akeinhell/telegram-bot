<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:14.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

class Location extends BaseType
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $latitude;
}
