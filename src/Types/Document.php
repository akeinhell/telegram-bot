<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:05
 */

namespace Telegram\Types;


use Telegram\Base\BaseType;

class Document extends BaseType
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var ProtoSize
     */
    protected $thumb;

    /**
     * @var string
     */
    protected $fileName;
    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var int
     */
    protected $fileSize;
}