<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $id_customer
 * @property int $id_user
 * @property string $customer_name
 * @property string $address
 * @property string $jenis_kelamin
 * @property string $phone_number
 * @property string $create_at
 * @property string $update_at
 *
 * @property Users $user
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_user', 'customer_name', 'address', 'jenis_kelamin', 'phone_number'], 'required'],
            [['id_user'], 'integer'],
            [['jenis_kelamin'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['id_customer'], 'string', 'max' => 15],
            [['customer_name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 17],
            [['id_customer'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'id_user' => 'Id User',
            'customer_name' => 'Customer Name',
            'address' => 'Address',
            'jenis_kelamin' => 'Jenis Kelamin',
            'phone_number' => 'Phone Number',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
