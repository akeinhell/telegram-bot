<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 06.11.2016
 * Time: 11:38
 */

namespace Telegram\Entry;


class InlineKeyboard
{
    private $rows;

    /**
     * InlineKeyboard constructor.
     */
    public function __construct()
    {
        $this->rows = collect();
    }

    /**
     * @param KeyboardButton[] $keyboardButtons
     */
    public function addRow(array $keyboardButtons)
    {
        $this->rows->push($keyboardButtons);
    }

    public static function create(array $rows = [])
    {
        $keyboard = new static();
        foreach ($rows as $row) {
            $keyboard->addRow($row);
        }

        return $keyboard;
    }

    public function toArray(){
        return $this->rows->toArray();
    }
}