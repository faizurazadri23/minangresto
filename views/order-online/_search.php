<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnlineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-online-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id_online') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'order_date') ?>

    <?= $form->field($model, 'payment_type') ?>

    <?= $form->field($model, 'manual_payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
