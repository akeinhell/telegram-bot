<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 20.11.16
 * Time: 20:02
 */

namespace Telegram\Entry;


use Illuminate\Support\Collection;
use Telegram\Base\BaseEntry;

class ReplyKeyboardEntry extends BaseEntry
{
    private $rows;

    const KEYBOARD_KEY = 'keyboard';

    public function __construct()
    {
        parent::__construct();
        $this->set(self::KEYBOARD_KEY, collect());
    }

    /**
     * @param KeyboardButton[] $row
     * @return $this
     */
    public function addRow(array $row)
    {
        $rows = $this->get(self::KEYBOARD_KEY, collect())->push($row);

        return $this->set(self::KEYBOARD_KEY, $rows);
    }

    /**
     * @return mixed
     */
    public function getKeyboard()
    {
        return $this->rows;
    }

    /**
     * @param bool $resize
     * @return $this
     */
    public function setResizeKeyboard(bool $resize)
    {
        return $this->set('resize_keyboard', $resize);
    }

    /**
     * @param bool $oneTime
     * @return $this
     */
    public function setOneTimeKeyboard(bool $oneTime)
    {
        return $this->set('one_time_keyboard', $oneTime);
    }

    /**
     * @param bool $selective
     * @return $this
     */
    public function setSelective(bool $selective)
    {
        return $this->set('selective', $selective);
    }

    public function toArray()
    {
        $rows = $this->get(self::KEYBOARD_KEY, collect());
        if (!is_array($rows) && get_class($rows) == Collection::class) {
            $clone = clone $this;
            $rows  = $clone
                ->get(self::KEYBOARD_KEY, collect())
                ->mapWithKeys(function ($item, $key) {
                    return [
                        $key => collect($item)
                            ->mapWithKeys(function ($item, $key) {
                                /** @var $item Collection */
                                return [$key => $item->toArray()];
                            }),
                    ];

                })
                ->toArray();

            $clone->set(self::KEYBOARD_KEY, $rows);

            return $clone::toArray();
        }

        return json_encode(parent::toArray());
    }


}