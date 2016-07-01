<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 16:45.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

/**
 * Class PhotoSize.
 */
class PhotoSize extends BaseType
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
