<?php

namespace app\notifications\command\send\senders;

use app\notifications\command\send\renderResults\AbstractRenderResult;

abstract class AbstractSender implements ISender
{
    public $name;

    /**
     * @param AbstractRenderResult $renderResult
     * @return bool
     */
    abstract public function send($renderResult);
}