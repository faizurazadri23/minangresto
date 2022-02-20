<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carts".
 *
 * @property int $id
 * @property int $user_id
 * @property string $kd_menu
 * @property float $price
 * @property int $quantity
 * @property string $create_at
 * @property string $update_at
 *
 * @property Menu $kdMenu
 * @property Users $user
 */
class Carts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kd_menu', 'price', 'quantity'], 'required'],
            [['user_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['create_at', 'update_at'], 'safe'],
            [['kd_menu'], 'string', 'max' => 5],
            [['kd_menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['kd_menu' => 'kd_menu']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'kd_menu' => 'Kode Menu',
            'price' => 'Harga',
            'quantity' => 'Quantity',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[KdMenu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKdMenu()
    {
        return $this->hasOne(Menu::className(), ['kd_menu' => 'kd_menu']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
