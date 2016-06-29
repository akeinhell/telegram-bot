<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 12:42
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

class Update extends BaseType
{
    /**
     * @required false
     * @description id of update
     * @var integer
     */
    protected $updateId;

    /**
     * @var Message
     */
    protected $message;
}