<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%venue}}".
 *
 * @property integer $id
 * @property string $venue_name
 * @property integer $capacity
 *
 * @property Schedule[] $schedules
 */
class Venue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%venue}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capacity'], 'integer'],
            [['venue_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'venue_name' => 'Venue Name',
            'capacity' => 'Capacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['venue_id' => 'id']);
    }
}
