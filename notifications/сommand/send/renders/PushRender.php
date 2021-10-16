<?php

namespace app\notifications\command\send\renders;

use app\notifications\command\send\Message;
use app\notifications\command\send\renderResults\PushRenderResult;

class PushRender extends AbstractRender
{
    public $name = "push";

    public function process(Message $message)
    {
        return new PushRenderResult($message, "");
    }
}