<?php


namespace Telegram\Models;


use Telegram\ResponseModel as Model;

class ChatPhoto extends Model
{
    protected $casts = [
        'small_file_id' => 'string',
        'big_file_id'   => 'string',
    ];
}