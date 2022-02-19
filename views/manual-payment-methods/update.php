<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ManualPaymentMethods */

$this->title = 'Update Manual Payment Methods: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Manual Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manual-payment-methods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
