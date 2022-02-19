<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MPaymentMethodType */

$this->title = 'Update M Payment Method Type: ' . $model->type_id;
$this->params['breadcrumbs'][] = ['label' => 'M Payment Method Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'type_id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mpayment-method-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
