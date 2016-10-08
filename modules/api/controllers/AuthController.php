<?php

namespace app\modules\api\controllers;

use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    private function newRole()
    {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole("bbbb");
        $auth->add($role);
    }

    private function newPermission()
    {
        $auth = Yii::$app->authManager;
        $permission = $auth->createPermission("bbbb");
        $auth->add($permission);
    }

    private function newChild()
    {
        $auth = Yii::$app->authManager;
        $parent = $auth->getRole("bbbb");
        $child = $auth->getPermission("aaa");
        $auth->addChild($parent, $child);
    }

    private function assign()
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole("bbbb");
        $auth->assign($role, 2);
    }
}
