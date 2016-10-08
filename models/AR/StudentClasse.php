<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%student_classe}}".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $classe_id
 * @property integer $expiry
 *
 * @property Classe $classe
 * @property Student $student
 */
class StudentClasse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%student_classe}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'classe_id'], 'required'],
            [['student_id', 'classe_id', 'expiry'], 'integer'],
            [['classe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classe::className(), 'targetAttribute' => ['classe_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'classe_id' => 'Classe ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasse()
    {
        return $this->hasOne(Classe::className(), ['id' => 'classe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
