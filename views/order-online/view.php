<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnline */

$this->title = $model->order_id_online;
$this->params['breadcrumbs'][] = ['label' => 'Order Onlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-online-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'order_id_online' => $model->order_id_online], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'order_id_online' => $model->order_id_online], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id_online',
            'id_customer',
            'order_date',
            'payment_type',
            'manual_payment',
        ],
    ]) ?>

</div>
