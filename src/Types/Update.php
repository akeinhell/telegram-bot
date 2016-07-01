<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 12:42.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

class Update extends BaseType
{
    /**
     * @var int
     */
    protected $updateId;

    /**
     * @var Message
     */
    protected $message;

    /**
     * @var Message
     */
    protected $editedMessage;

    /**
     * @var InlineQuery
     */
    protected $inlineQuery;

    /**
     * @var ChosenInlineResult
     */
    protected $chosenInlineResult;

    /**
     * @var CallbackQuery
     */
    protected $callbackQuery;
}
