<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 16:18.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

class MessageEntity extends BaseType
{
    /**
     * @var string Type of the entity. Can be mention (@username), hashtag, bot_command, url, email, bold (bold text),
     *             italic (italic text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs),
     *             text_mention (for users without usernames)
     */
    protected $type;

    /**
     * @var int
     */
    protected $offset;

    /**
     * @var int
     */
    protected $length;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var User
     */
    protected $user;
}
