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
     * @return static
     */
    public static function create($text = '', $requestContact = false, $requestLocation = false)
    {
        return (new static())
            ->setText($text)
            ->setRequestContact($requestContact)
            ->setRequestLocation($requestLocation);
    }

    public function setText($text)
    {
        return $this->set('text', $text);
    }

    /**
     * @param bool $requestContact
     * @return BaseEntry
     */
    public function setRequestContact(bool $requestContact)
    {
        return $this->set('request_contact', $requestContact);
    }

    public function setRequestLocation(bool $requestLocation){
        return $this->set('request_contact', $requestLocation);
    }
}