<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnSiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-on-site-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'order_id_onsite') ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'id_customer') ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'table_number') ?>
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
