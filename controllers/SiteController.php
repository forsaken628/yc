<?php

namespace app\controllers;

use app\models\AR\Admin;
use app\models\AR\Classe;
use app\models\AR\Course;
use app\models\AR\Schedule;
use app\models\AR\Student;
use app\models\AR\Teacher;
use app\models\CourseTable;
use app\models\VenueTable;
use Carbon\Carbon;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\log\Logger;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\AR\User;
use app\models\Organ;
use yii\web\Response;
use app\models\OrganTable;
use app\models\UserTable;
use app\models\UserForm;
use app\models\ClasseTable;

class SiteController extends Controller
{
    public $layout = 'main';

    public $defaultAction = 'courses';

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
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

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

    public function actionLogin()
    {
        $model = new LoginForm();
        //Yii::getLogger()->log($a,Logger::LEVEL_INFO);
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }
        return $this->renderPartial('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionIndex()
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

        if (Yii::$app->request->getIsAjax()) {
            return $this->renderAjax('index');
        } else {
            return $this->render('index');
        }
    }

    public function actionUsers()
    {
        return $this->renderAjax('users');
    }

    public function actionUsersAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $provider = new UserTable();
        $provider->setAttributes(Yii::$app->request->get());
        return $provider->run();
    }

    public function actionClasses()
    {
        return $this->renderAjax('classes');
    }

    public function actionClassesAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $provider = new ClasseTable();
        return $provider->run();
    }

    public function actionCourses()
    {
        if (Yii::$app->request->getIsAjax()) {
            return $this->renderAjax('courses');
        } else {
            return $this->render('courses');
        }
    }

    public function actionCoursesAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $provider = new CourseTable();
        return $provider->run();
    }

    public function actionCourseCalendar()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $get = Yii::$app->request->get();
        /**
         * @var $course Course
         */
        $course = Course::find()->with('schedules')->where(['id' => $get['id']])->one();
        $r = [];
        foreach ($course->schedules as $schedule) {
            $plans = $schedule->getPeriodPlans($get['start'], $get['end']);
            /**
             * @var $plan Carbon[]
             */
            foreach ($plans as $plan) {
                $event = ['title' => "$course->course_name-{$schedule->teacher->teacher_name}-{$schedule->venue->venue_name}"];
                $event['start'] = $plan[0]->toDateTimeString();
                $event['end'] = $plan[1]->toDateTimeString();
                $r[] = $event;
            }
        }
        return $r;
    }

    public function actionVenues()
    {
        return $this->renderAjax('venues');
    }

    public function actionVenuesAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $provider = new VenueTable();
        return $provider->run();
    }

    private function newRole()
    {
        $auth = Yii::$app->authManager;
        $auth = Yii::$app->getAuthManager();

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

    public function actionTest()
    {
//        $auth = Yii::$app->authManager;
//        //$auth->add($auth->createPermission("new_user"));
//        $parent = $auth->getRole("aaa");
//        $child = $auth->getPermission("edit_user");
//        $auth->addChild($parent, $child);

//        $auth->add($auth->createPermission("edit_user"));
//        $auth->add($auth->createPermission("delete_user"));
        //$auth->assign($auth->getPermission('new_user'), 2);
        //Yii::$app->response->format = Response::FORMAT_HTML;
        //var_dump($auth->getPermissions());
        //return [$auth->getPermissions()];
        //Yii::$app->response->format = Response::FORMAT_JSON;
        //return $organ->scenarios();
//        $this->on($this::EVENT_AFTER_ACTION, function ($e) {
//           echo date("H:i:s");
//        });

        $s = Schedule::findOne(1);
        var_dump($s->description);
        //$m = new UserForm();
        //var_dump($m->scenarios());
        return;
    }
}