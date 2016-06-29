<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 16:45
 */

namespace Telegram\Types;

/**
 * Class PhotoSize
 * @package Telegram\Types
 */
class PhotoSize
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $fileSize;
}