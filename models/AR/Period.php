<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%period}}".
 *
 * @property integer $id
 * @property integer $schedule_id
 * @property integer $order_id
 * @property string $teaching_plan
 * @property integer $is_complete
 *
 * @property Attendanc[] $attendancs
 * @property Schedule $schedule
 */
class Period extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%period}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['schedule_id'], 'required'],
            [['schedule_id', 'order_id', 'is_complete'], 'integer'],
            [['teaching_plan'], 'string'],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_id' => 'Schedule ID',
            'order_id' => 'Order ID',
            'teaching_plan' => 'Teaching Plan',
            'is_complete' => 'Is Complete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendancs()
    {
        return $this->hasMany(Attendanc::className(), ['period_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }
}
