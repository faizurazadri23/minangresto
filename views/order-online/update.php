<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnline */

$this->title = 'Update Order Online: ' . $model->order_id_online;
$this->params['breadcrumbs'][] = ['label' => 'Order Onlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id_online, 'url' => ['view', 'order_id_online' => $model->order_id_online]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-online-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
