<?php

namespace app\controllers;

use app\api\command\addSendMessage\exceptions\NotChannelException;
use app\api\command\addSendMessage\exceptions\NotDestinationException;
use app\api\command\addSendMessage\exceptions\ParamsJsonNotValidException;
use app\api\command\addSendMessage\Handler;
use Exception;
use Yii;
use yii\web\Controller;

class AddSendMessageController extends Controller
{
    public function actionIndex()
    {
        try {
            $request = Yii::$app->request;
            $handler = (new Handler())->handle($request);

            return "ok";
        } catch (NotDestinationException $exception) {
            return $exception->getMessage();
        } catch (NotChannelException $exception) {
            return $exception->getMessage();
        } catch (ParamsJsonNotValidException $exception) {
            return $exception->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}