<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_online".
 *
 * @property string $order_id_online
 * @property string $id_customer
 * @property string $order_date
 * @property string $payment_type
 * @property int $manual_payment
 */
class OrderOnline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_online';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id_online', 'id_customer', 'order_date', 'payment_type', 'manual_payment'], 'required'],
            [['order_date'], 'safe'],
            [['manual_payment'], 'integer'],
            [['order_id_online'], 'string', 'max' => 25],
            [['id_customer'], 'string', 'max' => 15],
            [['payment_type'], 'string', 'max' => 255],
            [['order_id_online'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id_online' => 'Order Id Online',
            'id_customer' => 'Id Customer',
            'order_date' => 'Order Date',
            'payment_type' => 'Payment Type',
            'manual_payment' => 'Manual Payment',
        ];
    }
}
