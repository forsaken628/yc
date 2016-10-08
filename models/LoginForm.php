<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\log\Logger;
use app\models\AR\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'string', 'length' => [6, 10], 'tooShort' => '用户名应不小于6位', 'tooLong' => '用户名应不大于10位'],
            ['password', 'string', 'length' => [6, 15], 'tooShort' => '密码应不小于6位', 'tooLong' => '密码应不大于15位'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名和账户不匹配');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            Yii::getLogger()->log('登陆', Logger::LEVEL_INFO, 'action:login');
            return Yii::$app->user->login($this->getUser());
        }
        Yii::getLogger()->log($this->getErrors(), Logger::LEVEL_INFO);
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
