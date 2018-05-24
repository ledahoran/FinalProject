<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $role;
    public $accessToken;

    const ROLE_ADMIN = 100;
    const ROLE_EDITOR = 200;
    const ROLE_AUTHOR = 300;


    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'leda',
            'password' => 'niall1993',
            'authKey' => 'test100key',
            'role' => 100,
            'accessToken' => '100',
        ],
        '101' => [
            'id' => '101',
            'username' => 'author',
            'password' => 'author',
            'authKey' => 'test101key',
            'role' => 200,
            'accessToken' => '200',
        ],
        '102' => [
            'id' => '102',
            'username' => 'editor',
            'password' => 'editor',
            'authKey' => 'test101key',
            'role' => 300,
            'accessToken' => '300',
        ],
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
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
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
