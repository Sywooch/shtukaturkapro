<?php

namespace app\models;

use Yii;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [];

    public static function instance()
    {
        if(!empty(self::$users))
            return self::$users;

        self::$users=[
            101=>[
                'id' => '101',
                'username' => Yii::$app->settings->get('adminName'),
                'password' => Yii::$app->settings->get('adminPassword'),
                'authKey' => 'test101key',
                'accessToken' => '101-token',
            ]
        ];

        return self::instance();
    }

    public function init()
    {
        self::instance();
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        self::instance();
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        self::instance();
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        self::instance();
        foreach (self::$users as $user) {
            if ($user['username'] == $username) {
                return new static($user);
            }
        }

        return null;
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
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password);
    }
}
