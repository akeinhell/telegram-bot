<?php


namespace Telegram\Models;


use Telegram\ResponseModel as Model;

class Chat extends Model
{
    protected $casts = [
        'id'                             => 'integer',
        'type'                           => 'string',
        'title'                          => 'string',
        'last_name'                      => 'string',
        'first_name'                     => 'string',
        'username'                       => 'string',
        'all_members_are_administrators' => 'boolean',
        'description'                    => 'string',
        'invite_link'                    => 'boolean',
        'photo'                          => ChatPhoto::class,
    ];

//    public function getPhotoAttribute() {
//        return new ChatPhoto($this->photo);
//    }


}