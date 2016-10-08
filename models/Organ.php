<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%organ}}".
 *
 * @property integer $id
 * @property string $org_name
 * @property string $org_app_name
 * @property string $photo
 * @property string $org_address
 * @property string $org_logo
 * @property string $org_logo_small
 * @property string $org_url
 * @property string $org_db_name
 * @property string $org_db_username
 * @property string $org_db_password
 */
class Organ extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%organ}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_name', 'phone', 'org_db_name', 'org_db_username'], 'string', 'max' => 40],
            [['org_app_name'], 'string', 'max' => 10],
            [['org_address', 'org_logo', 'org_logo_small', 'org_url'], 'string', 'max' => 255],
            [['org_db_password'], 'string', 'max' => 100],
            [['org_name', 'org_app_name'], 'required', 'on' => 'insert'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_name' => 'Org Name',
            'org_app_name' => 'Org App Name',
            'phone' => 'Phone',
            'org_address' => 'Org Address',
            'org_logo' => 'Org Logo',
            'org_logo_small' => 'Org Logo Small',
            'org_url' => 'Org Url',
            'org_db_name' => 'Org Db Name',
            'org_db_username' => 'Org Db Username',
            'org_db_password' => 'Org Db Password',
        ];
    }
}
