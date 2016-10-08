<?php
/**
 * Created by PhpStorm.
 * User: dt.thxopen.com
 * Date: 2014/12/7
 * Time: 11:13
 */
namespace app\models;

use app\models\AR\User;
use Yii;
use yii\base\Model;
use yii\web\BadRequestHttpException;
use yii\data\ActiveDataProvider;

/**
 *
 *
 */
class UserTable extends Model
{
    public $type, $search;

    public function rules()
    {
        return [
            ['type', 'required'],
            ['search', 'string'],
            ['type', 'in', 'range' => [1, 2, 3]],
        ];
    }

    public function run()
    {
        if (!$this->validate()) {
            throw new BadRequestHttpException;
        }
        $query = User::find()->where(['is_disable' => 0]);
        switch ($this->type) {
            case 1:
                $query = $query->andWhere(['type' => 1])->with('admin');
                break;
            case 2:
                $query = $query->andWhere(['type' => 2])->with('teacher');
                break;
            case 3:
                $query = $query->andWhere(['type' => 3])->with('student');
                break;
        }
        if ($this->search) {
            $query = $query->andWhere(['like', 'username', $this->search]);
        }
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        /**
         * @var $models User[]
         */
        $models = $provider->getModels();
        $user = [];
        foreach ($models as $model) {
            $arr = $model->toArray();
            switch ($model->type) {
                case 1:
                    $arr['admin_name'] = $model->admin->admin_name;
                    break;
                case 2:
                    $arr['teacher_name'] = $model->teacher->teacher_name;
                    break;
                case 3:
                    $arr['student_name'] = $model->student->student_name;
                    break;
            }
            $user[] = $arr;
        }

        return [
            'total' => $provider->getTotalCount(),
            'rows' => $user,
        ];
    }
}