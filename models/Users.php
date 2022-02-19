<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $user_type
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $avatar
 * @property string $address
 * @property string $authkey
 * @property string $create_at
 * @property string $update_at
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'username', 'password', 'address'], 'required'],
            [['address'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['user_type'], 'string', 'max' => 10],
            [['first_name', 'last_name'], 'string', 'max' => 25],
            [['username'], 'string', 'max' => 30],
            [['password', 'avatar'], 'string', 'max' => 255],
            ['avatar', 'file', 'extensions' => ['jpg', 'png', 'JPEG', 'JPG', 'gif', 'webp'],
                'wrongExtension'    => 'Hanya format gambar {extensions} yang diizinkan untuk {attribute}.',
            ],
            [['authkey'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type' => 'User Type',
            'first_name' => 'Nama Depan',
            'last_name' => 'Nama Belakang',
            'username' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'avatar' => 'Foto Profil',
            'address' => 'Alamat Tempat Tinggal',
            'authkey' => 'Authkey',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    public function getAuthKey()
    {
        return $this->authkey;
    }

    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authkey === $authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password){
        return $this->password === $password;
    }
}
