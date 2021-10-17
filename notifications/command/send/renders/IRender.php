<?php

namespace app\notifications\command\send\renders;

use app\notifications\command\send\Message;

interface IRender
{
    public function process(Message $message);
}