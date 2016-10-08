<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%time_range}}".
 *
 * @property integer $id
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $public
 * @property integer $share
 */
class TimeRange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%time_range}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_time', 'end_time', 'public', 'share'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'public' => 'Public',
            'share' => 'Share',
        ];
    }
}
