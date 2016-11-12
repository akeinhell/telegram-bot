<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 11:46
 */

namespace Telegram\Entry;


use Telegram\Base\BaseEntry;

class MessageEntry extends BaseEntry
{
    public static function create()
    {
        return new static();
    }

    /**
     * @param int $chatId
     *
     * @return $this
     */
    public function to($chatId)
    {
        return $this->set('to', $chatId);
    }

    public function withInlineKeyboard(InlineKeyboard $keyboard)
    {
        return $this->set('inline_keyboard', $keyboard->toArray());
    }

    public function text($text){
        return $this->set('text', $text);
    }

}