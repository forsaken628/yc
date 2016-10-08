<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-26
 * Time: 15:26
 */

namespace app\models;

use app\models\AR\Classe;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class ClasseTable extends Model
{

    public function rules()
    {
    }

    public function run()
    {
//        if (!$this->validate()) {
//            throw new BadRequestHttpException;
//        }
        $query = Classe::find()->with('courses', 'students');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        /**
         * @var $models Classe[]
         */
        $models = $provider->getModels();
        $classes = [];
        foreach ($models as $key => $model) {
            $classe = $model->toArray();
            $classe['studentCount'] = count($model->students);
            $classe['courseCount'] = count($model->courses);
            $classe['students'] = $model->students;
            $classe['courses'] = $model->courses;
            $classes[] = $classe;
        }

        return [
            'total' => $provider->getTotalCount(),
            'rows' => $classes,
        ];
    }

}