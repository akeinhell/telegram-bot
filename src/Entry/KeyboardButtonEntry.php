<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 20.11.16
 * Time: 20:05
 */

namespace Telegram\Entry;


use Telegram\Base\BaseEntry;

class KeyboardButtonEntry extends BaseEntry
{
    /**
     * @param $text
     * @param bool $requestContact
     * @param bool $requestLocation
     * @return KeyboardButtonEntry
     */
    public static function create($text = '', $requestContact = false, $requestLocation = false)
    {
        return (new static())
            ->setText($text)
            ->setRequestContact($requestContact)
            ->setRequestLocation($requestLocation);
    }

    /**
     * @param $text
     * @return $this
     */
    public function setText($text)
    {
        return $this->set('text', $text);
    }

    /**
     * @param bool $requestContact
     * @return $this
     */
    public function setRequestContact($requestContact)
    {
        return $this->set('request_contact', $requestContact);
    }

    /**
     * @param bool $requestLocation
     * @return $this
     */
    public function setRequestLocation($requestLocation){
        return $this->set('request_contact', $requestLocation);
    }
}