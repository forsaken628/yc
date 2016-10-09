<?php

namespace app\modules\api\controllers;

use app\models\Organ;
use app\models\User;
use app\models\UserForm;
use Yii;
use yii\filters\VerbFilter;
use yii\log\Logger;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'user' => ['post'],
//                    'organ' => ['post', 'put'],
//                ],
//            ],
        ];
    }

    public function actionUser()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
//        if (!Yii::$app->user->can('new_user')) {
//            throw new ForbiddenHttpException('对不起，您现在还没获此操作的权限');
//        }
        switch (Yii::$app->request->method) {
            case 'POST':
                $model = new UserForm();
                return $model->newUser();
            case 'PUT':
                $model = new UserForm();
                return $model->updateUser();
            case 'DELETE':
                $model = new UserForm();
                return $model->disableUser();
            default:
                throw new BadRequestHttpException();
        }
    }

    public function actionOrgan()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
//        if (!Yii::$app->user->can('new_organ')) {
//            throw new ForbiddenHttpException('对不起，您现在还没获此操作的权限');
//        }
        switch (Yii::$app->request->method) {
            case 'POST':
                $model = new Organ();
                $model->scenario = 'insert';
                $model->attributes = Yii::$app->request->post();
                if ($model->validate()) {
                    $model->save();
                    return $model;
                } else {
                    Yii::$app->response->statusCode = 400;
                    return $model->errors;
                }
                break;
            case 'PUT':
                $model = Organ::findOne(Yii::$app->request->post("id"));
                //$model->scenario = 'update';
                $model->attributes = Yii::$app->request->post();
                if ($model->validate()) {
                    $model->save();
                    return $model;
                } else {
                    Yii::$app->response->statusCode = 400;
                    return $model->errors;
                }
                break;
            default:
        }
    }

    public function actionRole()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
//        if (!Yii::$app->user->can('new_user')) {
//            throw new ForbiddenHttpException('对不起，您现在还没获此操作的权限');
//        }
        switch (Yii::$app->request->method) {
            case 'POST':
                $auth = Yii::$app->authManager;
                $name = Yii::$app->request->post("name");
                $description = Yii::$app->request->post("description");
                if (!$auth->getRole($name) && !$auth->getPermission($name)) {
                    $role = $auth->createRole($name);
                    $role->description = $description;
                    $auth->add($role);
                    Yii::getLogger()->log($name, Logger::LEVEL_INFO, "action:new_role");
                    Yii::$app->response->statusCode = 201;
                    return $role;//$model;
                } else {
                    Yii::$app->response->statusCode = 400;
                    return ['name' => ['已占用']];//$model->errors;
                }
                break;
            default:
        }
        return [];
    }

    public function actionRolePermission()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        switch (Yii::$app->request->method) {
            case 'PUT':
                $auth = Yii::$app->authManager;
                $roleName = Yii::$app->request->post("name");
                $role = $auth->getRole($roleName);
                if (!$role) {
                    return [];
                }
                $oldPms = $auth->getPermissionsByRole($roleName);
                $newPms = Yii::$app->request->post("permission");
                foreach ($oldPms as $p) {
                    if ($newPms && array_key_exists($p->name, $newPms)) {
                        unset($newPms[$p->name]);
                    } else {
                        $newPms[$p->name] = "off";
                    }
                }
                foreach ($newPms as $name => $o) {
                    $pm = $auth->getPermission($name);
                    if ($o == "on") {
                        $auth->addChild($role, $pm);
                        Yii::getLogger()->log('允许 ' . $role->description . ' ' . $pm->description, Logger::LEVEL_INFO, "action:edit_role");
                    } else {
                        $auth->removeChild($role, $pm);
                        Yii::getLogger()->log('禁止 ' . $role->description . ' ' . $pm->description, Logger::LEVEL_INFO, "action:edit_role");
                    }
                }
                return $auth->getPermissionsByRole($role->name);
                break;
            default:
        }
        return [];
    }

    public function actionOrgan11()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return Yii::$app->request->post();
    }

}
