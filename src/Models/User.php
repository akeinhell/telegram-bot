<?php


namespace Telegram\Models;


use Telegram\ResponseModel as Model;

class User extends Model
{
    protected $casts = [
        'id'            => 'integer',
        'is_bot'        => 'boolean',
        'first_name'    => 'string',
        'last_name'     => 'string',
        'username'      => 'string',
        'language_code' => 'string',
    ];
}