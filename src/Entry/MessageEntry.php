<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 11:46
 */

namespace Telegram\Entry;


use Telegram\Base\BaseEntry;

/**
 * Class MessageEntry
 * @package Telegram\Entry
 */
class MessageEntry extends BaseEntry
{
    /**
     * @param int $chatId
     * @return MessageEntry
     */
    public function to($chatId)
    {
        return $this->set('chat_id', $chatId);
    }

    public function withInlineKeyboard(InlineKeyboard $keyboard)
    {
        return $this->set('inline_keyboard', $keyboard->toArray());
    }

    public function text($text)
    {
        return $this->set('text', $text);
    }

    public function withReplyKeyboard(ReplyKeyboardEntry $keyboard)
    {
        return $this->set('reply_markup', $keyboard);
    }

    public function hideReplyKeyboard()
    {
        return $this->set('reply_markup', json_encode(['hide_keyboard' => true]));
    }

}