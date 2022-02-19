<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ManualPaymentMethods */

$this->title = 'Create Manual Payment Methods';
$this->params['breadcrumbs'][] = ['label' => 'Manual Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manual-payment-methods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
