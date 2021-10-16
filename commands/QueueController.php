<?php

namespace app\commands;

use app\notifications\command\send\entities\Queue;
use app\notifications\command\send\exceptions\QueueTypeIsNotMessageException;
use app\notifications\command\send\exceptions\RenderNotFoundException;
use app\notifications\command\send\exceptions\SenderNotFoundException;
use app\notifications\command\send\Handler;
use Exception;
use yii\console\Controller;
use yii\console\ExitCode;

class QueueController extends Controller
{
    public function actionIndex()
    {
        try {
            $queue = Queue::findOne(['status' => 0]);

            (new Handler())->handle($queue);

            // Поставим статус обработки
            //$queue->status = 1;
            //$queue->save();
        } catch (QueueTypeIsNotMessageException $exception) {
        } catch (RenderNotFoundException $exception) {
        } catch (SenderNotFoundException $exception) {
        } catch (Exception $exception) {

        }

        return ExitCode::OK;
    }
}
