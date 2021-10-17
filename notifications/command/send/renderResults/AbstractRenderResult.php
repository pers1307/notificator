<?php

namespace app\notifications\command\send\renderResults;

use app\notifications\command\send\Message;

abstract class AbstractRenderResult
{
    /**
     * @var Message
     */
    public $message;

    /**
     * @var string
     */
    public $text;

    /**
     * AbstractRenderResult constructor.
     * @param Message $message
     * @param string $text
     */
    public function __construct(Message $message, $text)
    {
        $this->message = $message;
        $this->text = $text;
    }
}