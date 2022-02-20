<?php

use app\models\Carts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keranjang Pesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Checkout', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'kd_menu',
            'price',
            'quantity',
            //'create_at',
            //'update_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
