<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:33
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

class KeyboardButton extends BaseType
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var boolean
     */
    protected $requestContact;

    /**
     * @var boolean
     */
    protected $requestLocation;
}