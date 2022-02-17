<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property string $kd_menu
 * @property string $nm_menu
 * @property float $harga
 * @property string $kd_kategori
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_menu', 'nm_menu', 'harga', 'kd_kategori'], 'required'],
            [['harga'], 'number'],
            [['kd_menu'], 'string', 'max' => 5],
            [['nm_menu'], 'string', 'max' => 100],
            [['kd_kategori'], 'string', 'max' => 3],
            [['kd_menu'], 'unique'],
            ['photo_menu', 'file', 'extensions' => ['jpg', 'png', 'JPEG', 'JPG', 'gif'],
                'wrongExtension'    => 'Hanya format gambar {extensions} yang diizinkan untuk {attribute}.',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kd_menu' => 'Kode Menu',
            'nm_menu' => 'Menu',
            'harga' => 'Harga',
            'kd_kategori' => 'Kode Kategori',
            'photo_menu'    => 'Gambar Menu'
        ];
    }
}
