<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property string $kd_kategori
 * @property string $nm_kategori
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_kategori', 'nm_kategori'], 'required'],
            [['kd_kategori'], 'string', 'max' => 3],
            [['nm_kategori'], 'string', 'max' => 100],
            [['kd_kategori'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kd_kategori' => 'Kode Kategori',
            'nm_kategori' => 'Kategori',
        ];
    }
}
