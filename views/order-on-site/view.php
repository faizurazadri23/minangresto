<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnSite */

$this->title = $model->order_id_onsite;
$this->params['breadcrumbs'][] = ['label' => 'Order On Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-on-site-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'order_id_onsite' => $model->order_id_onsite], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'order_id_onsite' => $model->order_id_onsite], [
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
            'order_id_onsite',
            'id_customer',
            'order_date',
            'number_of_people',
            'table_number',
        ],
    ]) ?>

</div>
