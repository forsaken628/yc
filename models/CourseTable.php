<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-26
 * Time: 18:24
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\AR\Course;
use yii\data\ActiveDataProvider;

class CourseTable extends Model
{

    public function run()
    {
//        if (!$this->validate()) {
//            throw new BadRequestHttpException;
//        }
        $query = Course::find()
            ->with('classe', 'classe.students',
                'schedules', 'schedules.teacher', 'schedules.venue');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        /**
         * @var $models Course[]
         */
        $models = $provider->getModels();
        $courses = [];
        foreach ($models as $key => $model) {
            $course = $model->toArray([], ['classe']);
            $course['classe_name'] = $model->classe->classe_name;
            $course['students'] = $model->classe->students;
            foreach ($model->schedules as $schedule) {
                $arr = $schedule->toArray([], ['teacher', 'venue']);
                $arr['description'] = $schedule->description;
                $course['schedules'][] = $arr;
            }
            $courses[] = $course;
        }

        return [
            'total' => $provider->getTotalCount(),
            'rows' => $courses,
        ];
    }
}