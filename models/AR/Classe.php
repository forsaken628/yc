<?php

namespace app\models\AR;

use Yii;

/**
 * This is the model class for table "{{%classe}}".
 *
 * @property integer $id
 * @property string $classe_name
 *
 * @property Course[] $courses
 * @property Student[] $students
 */
class Classe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%classe}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classe_name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'classe_name' => 'Classe Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['classe_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id' => 'student_id'])
            ->viaTable(StudentClasse::tableName(), ['classe_id' => 'id']);
    }
}
