<?php

namespace app\api\command\addSendMessage\helpers;

use app\api\command\addSendMessage\Command;
use app\api\command\addSendMessage\exceptions\NotChannelException;
use app\api\command\addSendMessage\exceptions\NotDestinationException;
use app\api\command\addSendMessage\exceptions\ParamsJsonNotValidException;
use yii\web\Request;

class MapRequestToCommandHelper
{
    public static function map(Request $request)
    {
        $params = $request->post();

        if (
            (!isset($params['userId']) || empty($params['userId']))
            && (!isset($params['groupId']) || empty($params['groupId']))
        ) {
            throw new NotDestinationException("У сообщения должен быть адресат");
        }

        if ((!isset($params['channels']) || empty($params['channels']))) {
            throw new NotChannelException("У сообщения должен быть хотя бы один канал отправки");
        }

        if (isset($params['params']) && !empty($params['params'])) {
            $result = json_decode($params['params'], true);

            if ($result === null)
                throw new ParamsJsonNotValidException("У сообщения не валидный json в параметрах");
        }

        return new Command($params['userId'], $params['groupId'], $params['channels'], $params['params']);
    }
}