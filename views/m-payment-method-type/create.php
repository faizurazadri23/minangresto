<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MPaymentMethodType */

$this->title = 'Create M Payment Method Type';
$this->params['breadcrumbs'][] = ['label' => 'M Payment Method Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpayment-method-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
