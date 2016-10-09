<?php

namespace app\models;

use app\models\AR\Student;
use app\models\AR\Teacher;
use app\models\AR\Admin;
use app\models\AR\User;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\log\Logger;
use yii\web\BadRequestHttpException;

/**
 *
 * @property integer $id
 * @property string $username
 * @property string $password 密码
 * @property string $hash 密码散列
 * @property integer $type 用户类型
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserForm extends Model
{
    public $username, $password, $type,
        $admin_name, $teacher_name, $student_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'type'], 'required'],
            ['admin_name', 'required', 'on' => ['admin']],
            ['teacher_name', 'required', 'on' => ['teacher']],
            ['student_name', 'required', 'on' => ['student']],
        ];
    }

    public function newUser()
    {
        switch (Yii::$app->request->post('type')) {
            case User::USER_ADMIN:
                $this->setScenario('admin');
                $detail = new Admin();
                break;
            case User::USER_TEACHER:
                $this->setScenario('teacher');
                $detail = new Teacher();
                break;
            case User::USER_STUDENT:
                $this->setScenario('student');
                $detail = new Student();
                break;
            default:
                throw new BadRequestHttpException();
        }
        $user = new User();
        $this->attributes = Yii::$app->request->post();
        $this->type = (int)$this->type;
        $user->attributes = $this->attributes;
        $detail->attributes = $this->attributes;
        if ($this->validate() && $user->validate() && $detail->validate()) {
            $user->save(false);
            $detail->id = $user->id;
            $detail->save(false);
        } else {
            Yii::$app->response->statusCode = 400;
            $this->addErrors($user->errors);
            $this->addErrors($detail->errors);
            return ['errors' => $this->errors];
        }
        return ArrayHelper::merge($user->toArray(), $detail->toArray());
    }

    public function updateUser()
    {
        $user = User::findOne(Yii::$app->request->post('id'));
        switch ($user->type) {
            case User::USER_ADMIN:
                $this->setScenario('admin');
                $detail = $user->admin;
                break;
            case User::USER_TEACHER:
                $this->setScenario('teacher');
                $detail = $user->teacher;
                break;
            case User::USER_STUDENT:
                $this->setScenario('student');
                $detail = $user->student;
                break;
        }
        $attributes = Yii::$app->request->post();
        unset($attributes['type']);
        unset($attributes['id']);
        if (empty($attributes['password'])) {
            unset($attributes['password']);
        }
        $user->attributes = $attributes;
        $detail->attributes = $attributes;
        if ($user->validate() && $detail->validate()) {
            $user->save(false);
            $detail->save(false);
        } else {
            Yii::$app->response->statusCode = 400;
            $this->addErrors($user->errors);
            $this->addErrors($detail->errors);
            return ['errors' => $this->errors];
        }
        return ArrayHelper::merge($user->toArray(), $detail->toArray());
    }

    public function disableUser()
    {
        $user = User::findOne(Yii::$app->request->post('id'));
        $user->is_disable = 1;
        return $user->save();
    }
}
