<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-online-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id_online')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'payment_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manual_payment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
