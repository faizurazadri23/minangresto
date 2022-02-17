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

    <?= $form->field($model, 'order_id_onsite') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'order_date') ?>

    <?= $form->field($model, 'number_of_people') ?>

    <?= $form->field($model, 'table_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
