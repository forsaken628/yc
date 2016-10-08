<?php

namespace app\controllers;

use app\models\DataTables;
use Yii;
use yii\filters\AccessControl;
use yii\log\Logger;
use yii\web\Controller;
use app\models\User;
use app\models\Organ;
use app\models\Log;
use app\models\LogTable;
use yii\web\Response;

class ConfigController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
////            'verbs' => [
////                'class' => VerbFilter::className(),
////                'actions' => [
////                    'logout' => ['post'],
////                ],
////            ],
//        ];
//    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionAuths()
    {
//        $d = include('D:\WorkSpace\WWW\yzjconsole\tests\unit\fixtures\data\student.php');
//        //var_dump($data);
//        foreach ($d as $data) {
//            $o = new Organ();
//            foreach ($data as $key => $item) {
//                $o->$key = $item;
//            }
//            $o->save();
//        }

        //$user=User::findIdentity(2);
        //Yii::$app->user->login($user);
        //var_dump($user);
        //var_dump(Yii::$app->user->can("aaa"));
        //return $this->renderPartial('index');
        //Yii::getLogger()->log("asdfasdf",Logger::LEVEL_INFO,"action:avc");

        return $this->renderAjax('auths');
    }

    public function actionLogs()
    {
        $logs = Log::find()->with('user')->all();
        return $this->renderAjax('logs', ['logs' => $logs]);
    }

    public function actionLogsAjax()
    {
        $model = new LogTable();
        $model->setAttributes(Yii::$app->request->get());

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $model->run();
    }

}