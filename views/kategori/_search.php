<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'kd_kategori') ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'nm_kategori') ?>
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
