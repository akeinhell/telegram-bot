<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 14:15
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

/**
 *
 * 
 * Class Message
 * @package Telegram\Types
 */
class Message extends BaseType
{
    /**
     * @var
     */
    protected $messageId;

    /**
     * @var User
     */
    protected $from;

    /**
     * @var Chat
     */
    protected $chat;

    /**
     * @var int
     */
    protected $date;

    /**
     * @var string
     */
    protected $text;
}