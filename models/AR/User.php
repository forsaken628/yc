<?php

namespace app\models\AR;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\log\Logger;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property integer $type 用户类型
 * @property string $hash 密码散列
 * @property string $auth_key
 * @property string $access_token
 * @property bool $is_disable
 * @property integer $create_at
 * @property integer $update_at
 *
 * @property Admin $admin
 * @property Attendanc[] $attendancs
 * @property Student $student
 * @property Teacher $teacher
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const USER_ADMIN = 1;
    const USER_TEACHER = 2;
    const USER_STUDENT = 3;

    private $_password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'type'], 'required'],
            ['username', 'string', 'length' => [6, 10], 'tooShort' => '用户名应不小于6位', 'tooLong' => '用户名应不大于10位'],
            ['type', 'in', 'range' => [1, 2, 3]],
            ['password', 'string', 'length' => [6, 15], 'tooShort' => '密码应不小于6位', 'tooLong' => '密码应不大于15位'],
            [['access_token'], 'string', 'max' => 40],
            [['hash', 'auth_key'], 'string', 'max' => 60],
            [['username'], 'unique'],
            [['access_token'], 'unique'],
            [['auth_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'hash' => '密码散列',
            'type' => '用户类型',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'is_disable' => '已停用',
            'create_at' => '注册时间',
            'update_at' => '更新时间',
        ];
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['hash']);

        return $fields;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function findUserType($type)
    {
        switch ($type) {
            case self::USER_ADMIN:
                return "管理员";
                break;
            case self::USER_TEACHER:
                return "老师";
                break;
            case self::USER_STUDENT:
                return "学生";
                break;
            default:
                return false;
        }
    }

    public function getUserType()
    {
        return self::findUserType($this->type);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id, 'is_disable' => 0]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return self::findOne(["auth_key" => $token]);
        //不启用持久性访问令牌
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //strcasecmp($user['username'], $username) === 0
        return self::findOne(['username' => strtolower($username), 'is_disable' => 0]);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return "已停用";
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        //不启用cookie自动登陆
        //return $this->auth_key === $authKey;
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->hash);
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword($password)
    {
        $this->on($this::EVENT_BEFORE_INSERT, function ($event) {
            Yii::beginProfile("hash", __METHOD__);
            $this->hash = Yii::$app->getSecurity()->generatePasswordHash($this->_password);
            Yii::endProfile("hash", __METHOD__);
        });
        $this->on($this::EVENT_BEFORE_UPDATE, function ($event) {
            Yii::beginProfile("hash", __METHOD__);
            $this->hash = Yii::$app->getSecurity()->generatePasswordHash($this->_password);
            Yii::endProfile("hash", __METHOD__);
        });
        Yii::trace($this->_password, __METHOD__);
        $this->_password = $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendancs()
    {
        return $this->hasMany(Attendanc::className(), ['create_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'id']);
    }

}
