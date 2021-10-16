<?php


namespace app\notifications\command\send\senders;

use app\notifications\command\send\Message;
use app\notifications\command\send\renders\AbstractRender;

class PushSender extends AbstractRender
{
    public $name = "push";

    public function process(Message $message)
    {

    }
}