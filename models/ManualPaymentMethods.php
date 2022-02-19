<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manual_payment_methods".
 *
 * @property int $id
 * @property string $method_type
 * @property string $heading
 * @property string $description
 * @property string|null $bank_info
 * @property string|null $photo
 * @property string $create_at
 * @property string $update_at
 *
 * @property MPaymentMethodType $methodType
 */
class ManualPaymentMethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manual_payment_methods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'heading', 'description'], 'required'],
            [['description', 'bank_info'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['type_id', 'heading', 'photo'], 'string', 'max' => 255],
            ['photo', 'file', 'extensions' => ['jpg', 'png', 'JPEG', 'JPG', 'gif'],
                'wrongExtension'    => 'Hanya format gambar {extensions} yang diizinkan untuk {attribute}.',
            ],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MPaymentMethodType::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Method Type',
            'heading' => 'Heading',
            'description' => 'Description',
            'bank_info' => 'Bank Info',
            'photo' => 'Logo',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[MethodType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethodType()
    {
        return $this->hasOne(MPaymentMethodType::className(), ['type_id' => 'type_id']);
    }
}
