<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_menu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_menu')->textInput(['maxlength' => true]) ?>

    <?php
        $queryCategory = (new \app\models\Kategori())->find()->orderBy(['nm_kategori'=> SORT_ASC])->all();

        $dataCategory = \yii\helpers\ArrayHelper::map($queryCategory, 'kd_kategori', 'nm_kategori');

        echo $form->field($model, 'kd_kategori')->dropDownList($dataCategory, [
            'prompt'=>'--Pilih Kategori--'
        ])->label('Kategori');
    ?>


    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'photo_menu')->fileInput(); ?>
    
    <div class="form-group">
        <?= Html::submitButton('Buat Menu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
