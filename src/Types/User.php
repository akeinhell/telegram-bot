<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 15:35.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

/**
 * Class User.
 */
class User extends BaseType
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $username;
}
