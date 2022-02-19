<?php

use app\models\MPaymentMethodType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ManualPaymentMethods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manual-payment-methods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $queryCategory = (new \app\models\MPaymentMethodType())->find()->orderBy(['method_name'=> SORT_ASC])->all();

        $dataCategory = \yii\helpers\ArrayHelper::map($queryCategory, 'type_id', 'method_name');

        echo $form->field($model, 'type_id')->dropDownList($dataCategory, [
            'prompt'=>'--Pilih Metode Pembayaran--'
        ])->label('Metode Pembayaran');
    ?>

    <?= $form->field($model, 'heading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bank_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
