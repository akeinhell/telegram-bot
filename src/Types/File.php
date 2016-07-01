<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 29.06.16
 * Time: 17:31.
 */
namespace Telegram\Types;

use Telegram\Base\BaseType;

class File extends BaseType
{
    /*file_id	String	Unique identifier for this file
    file_size	Integer	Optional. File size, if known
    file_path	String	Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.*/

    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var int
     */
    protected $fileSize;

    /**
     * @var string
     */
    protected $filePath;
}
