<?php


namespace app\api\command\addSendMessage\helpers;

use app\api\command\addSendMessage\Command;
use app\api\command\addSendMessage\entities\Queue;

class MapCommandToEntityHelper
{
    public static function map(Command $command)
    {
        $params = json_decode($command->params, true);

        $params['userId'] = $command->userId;
        $params['groupId'] = $command->groupId;
        $params['channels'] = $command->channels;

        return new Queue(
            "message",
            json_encode($params),
            0
        );
    }
}