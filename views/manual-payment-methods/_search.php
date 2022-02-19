<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ManualPaymentMethodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manual-payment-methods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'type_id') ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'heading') ?>
        </div>

        <div class="col-md-2">
            <div class="form-group" style="padding-top: 25px">
            <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Atur Ulang', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
