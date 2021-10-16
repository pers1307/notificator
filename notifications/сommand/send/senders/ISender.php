<?php

namespace app\notifications\command\send\senders;

use app\notifications\command\send\renderResults\AbstractRenderResult;

interface ISender
{
    /**
     * @param AbstractRenderResult $renderResult
     * @return bool
     */
    public function send($renderResult);
}