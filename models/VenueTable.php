<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-26
 * Time: 20:46
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\AR\Venue;
use yii\data\ActiveDataProvider;

class VenueTable extends Model
{
    public function run()
    {
//        if (!$this->validate()) {
//            throw new BadRequestHttpException;
//        }
        $query = Venue::find();
//            ->with('classe', 'classe.students',
//                'schedules', 'schedules.teacher', 'schedules.venue');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        /**
         * @var $models Venue[]
         */
        $models = $provider->getModels();

        return [
            'total' => $provider->getTotalCount(),
            'rows' => $models,
        ];
    }
}