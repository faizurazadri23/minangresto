<?php

use app\models\OrderOnSite;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderOnSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesanan Ditempat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-on-site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        if(Yii::$app->user->identity->user_type==="admin"){

        ?>
        <p>
            <?= Html::a('Buat Pesanan Ditempat', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php }?>


    

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id_onsite',
            'id_customer',
            'order_date',
            'number_of_people',
            'table_number',
            'payment_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrderOnSite $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'order_id_onsite' => $model->order_id_onsite]);
                 }
            ],
        ],
    ]); ?>


</div>
