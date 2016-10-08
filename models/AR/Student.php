<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property integer $id
 * @property string $student_name
 *
 * @property Attendanc[] $attendancs
 * @property User $id0
 * @property StudentClasse[] $studentClasses
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%student}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['student_name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_name' => 'Student Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendancs()
    {
        return $this->hasMany(Attendanc::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentClasses()
    {
        return $this->hasMany(StudentClasse::className(), ['student_id' => 'id']);
    }
}
