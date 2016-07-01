<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:05.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

class Video extends BaseType
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var int
     */
    protected $fileSize;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var PhotoSize
     */
    protected $thumb;
}
