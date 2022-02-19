<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_payment_method_type".
 *
 * @property string $type_id
 * @property string $description
 * @property string $method_name
 *
 * @property ManualPaymentMethods[] $manualPaymentMethods
 */
class MPaymentMethodType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_payment_method_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'description', 'method_name'], 'required'],
            [['description'], 'string'],
            [['type_id', 'method_name'], 'string', 'max' => 255],
            [['type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'description' => 'Description',
            'method_name' => 'Method Name',
        ];
    }

    /**
     * Gets query for [[ManualPaymentMethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    
}
