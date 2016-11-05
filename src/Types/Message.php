<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 14:15
 */

namespace Telegram\Types;


use Carbon\Carbon;
use Telegram\Base\BaseType;

/**
 *
 *
 * Class Message
 * @package Telegram\Types
 */
class Message extends BaseType
{
    protected $map = [
        'from' => User::class,
        'chat' => Chat::class,
        'date' => [Carbon::class, 'createFromTimestamp']
    ];

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }


//    /**
//     * @var
//     */
//    protected $messageId;
//
//    /**
//     * @var User
//     */
//    protected $from;
//
//    /**
//     * @var Chat
//     */
//    protected $chat;
//
//    /**
//     * @var int
//     */
//    protected $date;
//
//    /**
//     * @var string
//     */
//    protected $text;
//
//    /**
//     * @var User
//     */
//    protected $forwardFrom;
//
//    /**
//     * @var Chat
//     */
//    protected $forwardFromChat;
//
//    /**
//     * @var int
//     */
//    protected $forwardDate;
//
//    /**
//     * @var Message
//     */
//    protected $replyToMessage;
//
//    /**
//     * @var int
//     */
//    protected $editDate;
//
//    /**
//     * @var MessageEntity[]
//     */
//    protected $entities;
//
//    /**
//     * @var Audio
//     */
//    protected $audio;
//
//    /**
//     * @var Document
//     */
//    protected $document;
//
//    /**
//     * @var PhotoSize[]
//     */
//    protected $photo;
//
//    /**
//     * @var Sticker
//     */
//    protected $sticker;
//
//    /**
//     * @var Video
//     */
//    protected $video;
//
//    /**
//     * @var Voice
//     */
//    protected $voice;
//
//    /**
//     * @var string
//     */
//    protected $caption;
//
//    /**
//     * @var Contact
//     */
//    protected $contact;
//
//    /**
//     * @var Location
//     */
//    protected $location;
//
//    /**
//     * @var Venue
//     */
//    protected $venue;
//
//    /**
//     * @var User
//     */
//    protected $newChatMember;
//
//    /**
//     * @var User
//     */
//    protected $leftChatMember;
//
//    /**
//     * @var string
//     */
//    protected $newChatTitle;
//
//    /**
//     * @var PhotoSize[]
//     */
//    protected $newChatPhoto;
//
//    /**
//     * @var boolean
//     */
//    protected $deleteChatPhoto;
//
//    /**
//     * @var boolean
//     */
//    protected $groupChatCreated;
//
//    /**
//     * @var boolean
//     */
//    protected $superGroupChatCreated;
//
//    /**
//     * @var boolean
//     */
//    protected $channelChatCreated;
//
//    /**
//     * @var int
//     */
//    protected $migrateToChatId;
//
//    /**
//     * @var int
//     */
//    protected $migrateFromChatId;
//
//    /**
//     * @var Message
//     */
//    protected $pinnedMessage;


}