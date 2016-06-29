<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:09
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

class Sticker extends BaseType
{
    /*file_id	String	Unique identifier for this file
    width	Integer	Sticker width
    height	Integer	Sticker height
    thumb	PhotoSize	Optional. Sticker thumbnail in .webp or .jpg format
    emoji	String	Optional. Emoji associated with the sticker
    file_size	Integer	Optional. File size*/

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
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * @var string
     */
    protected $emoji;

    /**
     * @var int
     */
    protected $fileSize;
}