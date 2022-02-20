<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        if(Yii::$app->user->isGuest){
        ?>
            
        <?php } else if(Yii::$app->user->identity->user_type==="admin"){
            ?>
            <?= $form->field($model, 'user_type')->dropDownList([ 'customer' => 'customer', 'admin' => 'admin', 'staf' => 'staf' ], ['prompt' => 'Silahkan Pilih Tipe Akun']) ?>
            
            <?php }
    ?>

    

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder'    => 'Nama Depan']) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder'    => 'Nama Belakang']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder'    => 'Nama Pengguna']) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder'    => 'Kata Sandi']) ?>

    <?= $form->field($model, 'avatar')->fileInput(); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6, 'placeholder'    => 'Alamat Tempat Tinggal']) ?>

    <!-- <?= $form->field($model, 'authkey')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
