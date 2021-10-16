<?php


namespace app\notifications\command\send\senders;


use app\notifications\command\send\Message;
use app\notifications\command\send\renders\AbstractRender;

class SmsSender extends AbstractRender
{
    public $name = "sms";

    public function process(Message $message)
    {

    }
}