<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:29
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

class Venue extends BaseType
{
    /*location	Location	Venue location
    title	String	Name of the venue
    address	String	Address of the venue
    foursquare_id	String	Optional. Foursquare identifier of the venue*/
    /**
     * @var Location
     */
    protected $location;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $foursquareId;
}