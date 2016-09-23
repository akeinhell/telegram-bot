<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 23.09.16
 * Time: 18:26
 */

namespace Telegram\Config;


class FileConfig extends BaseConfig
{
    /**
     * @var
     */
    private $path;

    /**
     * FileConfig constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    public function getValue($chatId, $value, $default)
    {
        return array_get($this->get($chatId), $value, $default);
    }

    public function get($chatId)
    {
        return $this->getContent($chatId);
    }

    private function getContent($chatId)
    {
        $file = $this->getFileName($chatId);

        return file_exists($file) ? \GuzzleHttp\json_decode(file_get_contents($file)) : [];
    }

    private function getFileName($chatId)
    {
        return $this->path . 'c' . $chatId;
    }

    public function setValue($chatId, $key, $value)
    {
        $data       = $this->get($chatId);
        $data[$key] = $value;
        $this->set($chatId, $data);
    }

    public function set($chatId, array $params)
    {
        file_put_contents($this->getFileName($chatId), \GuzzleHttp\json_encode($params));
    }
}