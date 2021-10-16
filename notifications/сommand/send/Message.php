<?php


namespace app\notifications\command\send;

/**
 * хочу отдельный класс для нотификатора
 * Class Message
 * @package app\notifications\command\send
 */
class Message extends Command
{
    /**
     * Message constructor.
     * @param Command $command
     */
    public function __construct(Command $command)
    {
        parent::__construct($command->userId, $command->groupId, $command->channels, $command->params);
    }
}