<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 1:43
 */

namespace Telegram\Types;


use Telegram\Base\ArrayOfBaseType;

class MessageEntities extends ArrayOfBaseType
{
    protected $baseType = MessageEntity::class;
}