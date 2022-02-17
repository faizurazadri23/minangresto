<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnSite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-on-site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id_onsite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'number_of_people')->textInput() ?>

    <?= $form->field($model, 'table_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
