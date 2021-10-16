<?php

namespace app\notifications\command\send\renders;

use app\notifications\command\send\Message;

abstract class AbstractRender implements IRender
{
    public $name;
    abstract public function process(Message $message);
}