<?php

namespace app\notifications\command\send\helpers;

use app\notifications\command\send\Command;
use app\notifications\command\send\entities\Queue;
use app\notifications\command\send\exceptions\QueueTypeIsNotMessageException;

class MapQueueItemToCommandHelper
{
    public static $TYPE = "message";

    public static function map(Queue $queue)
    {
        if ($queue->type !== MapQueueItemToCommandHelper::$TYPE)
            throw new QueueTypeIsNotMessageException("Элемент очереди имеет неправильный тип");

        $params = json_decode($queue->params, true);

        return new Command(
            $params['userId'],
            $params['groupId'],
            $params['channels'],
            self::clearParam($params)
        );
    }

    /**
     * @param array $params
     * @return false|string
     */
    private static function clearParam(array $params)
    {
        unset($params['userId']);
        unset($params['groupId']);
        unset($params['channels']);

        return json_encode($params);
    }
}