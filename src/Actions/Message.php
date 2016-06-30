<?php
/**
 * Created by PhpStorm.
 * User: akeinhell
 * Date: 22.06.16
 * Time: 12:53
 */

namespace Telegram\Actions;

use Telegram\Base\BaseAction;

class Message implements Base
{

    public function send()
    {
        return true;
    }
}