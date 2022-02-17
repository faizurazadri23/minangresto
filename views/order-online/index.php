<?php

use app\models\OrderOnline;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderOnlineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesanan Online';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-online-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id_online',
            'id_customer',
            'order_date',
            'payment_type',
            'manual_payment',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrderOnline $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'order_id_online' => $model->order_id_online]);
                 }
            ],
        ],
    ]); ?>


</div>
