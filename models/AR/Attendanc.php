<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%attendanc}}".
 *
 * @property integer $id
 * @property integer $period_id
 * @property integer $student_id
 * @property integer $create_by
 * @property integer $create_at
 * @property integer $update_at
 *
 * @property Period $period
 * @property Student $student
 * @property User $createBy
 */
class Attendanc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attendanc}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['period_id', 'student_id', 'create_by'], 'required'],
            [['period_id', 'student_id', 'create_by', 'create_at', 'update_at'], 'integer'],
            [['period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::className(), 'targetAttribute' => ['period_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['create_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['create_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'period_id' => 'Period ID',
            'student_id' => 'Student ID',
            'create_by' => 'Create By',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(Period::className(), ['id' => 'period_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateBy()
    {
        return $this->hasOne(User::className(), ['id' => 'create_by']);
    }
}
