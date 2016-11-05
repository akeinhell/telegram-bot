<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 12:42
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

/**
 * Class Update
 * @method int getUpdateId
 * @method Message getMessage
 * @method Message getEditedMessage
 * @method InlineQuery getInlineQuery
 * @method ChosenInlineResult getChosenInlineResult
 * @method CallbackQuery getCallbackQuery
 *
 * @package Telegram\Types
 *
 */
class Update extends BaseType
{
    protected $map = [
        'message'       => Message::class,
        'editedMessage' => Message::class,
    ];
}