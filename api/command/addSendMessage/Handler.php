<?php

namespace app\api\command\addSendMessage;

use app\api\command\addSendMessage\helpers\MapCommandToEntityHelper;
use app\api\command\addSendMessage\helpers\MapRequestToCommandHelper;
use yii\web\Request;

class Handler
{
    /**
     * Принять и запихнуть в БД
     */
    public function handle(Request $request)
    {
        $command = MapRequestToCommandHelper::map($request);

        /** var Queue */
        $entity = MapCommandToEntityHelper::map($command);
        $entity->save();
    }
}