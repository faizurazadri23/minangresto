<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "on_site_order".
 *
 * @property string $order_id_onsite
 * @property string $id_customer
 * @property string $order_date
 * @property int $number_of_people
 * @property int $table_number
 */
class OrderOnSite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'on_site_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id_onsite', 'id_customer', 'order_date', 'number_of_people', 'table_number'], 'required'],
            [['order_date'], 'safe'],
            [['number_of_people', 'table_number'], 'integer'],
            [['order_id_onsite'], 'string', 'max' => 255],
            [['id_customer'], 'string', 'max' => 15],
            [['order_id_onsite'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id_onsite' => 'Kode Pesanan',
            'id_customer' => 'ID Pelanggan',
            'order_date' => 'Order Date',
            'number_of_people' => 'Jumlah Orang',
            'payment_status'    => 'Status Bayar',
            'table_number' => 'Nomor Meja',
        ];
    }
}
