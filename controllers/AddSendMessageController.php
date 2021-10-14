<?php

namespace app\controllers;

use app\api\command\addSendMessage\exceptions\NotChannelException;
use app\api\command\addSendMessage\exceptions\NotDestinationException;
use app\api\command\addSendMessage\exceptions\ParamsJsonNotValidException;
use app\api\command\addSendMessage\Handler;
use Exception;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AddSendMessageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        try {
            $request = Yii::$app->request;
            (new Handler())->handle($request);

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