<?php

namespace app\notifications\command\send\renders;

use app\notifications\command\send\Message;
use app\notifications\command\send\renderResults\SmsRenderResult;

class SmsRender extends AbstractRender
{
    public $name = "sms";

    public function process(Message $message)
    {
        return new SmsRenderResult($message, "");
    }
}