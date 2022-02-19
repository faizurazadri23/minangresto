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
            <?= $form->field($model, 'user_type')->textInput(['maxlength' => true]) ?>
            <?php }
    ?>

    

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->fileInput(); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'authkey')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
