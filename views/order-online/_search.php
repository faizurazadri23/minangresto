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

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'order_id_online') ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'id_customer') ?>
        </div>

        <div class="col-md-2">

            <?php
                $queryCategory = (new \app\models\ManualPaymentMethods())->find()->orderBy(['heading'=> SORT_ASC])->all();

                $dataCategory = \yii\helpers\ArrayHelper::map($queryCategory, 'id', 'heading');

                echo $form->field($model, 'manual_payment')->dropDownList($dataCategory, [
                    'prompt'=>'--Pilih Pembayaran--'
                ])->label('Jenis Pembayaran');
            ?>
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
