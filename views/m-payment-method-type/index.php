<?php

use app\models\MPaymentMethodType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MPaymentMethodTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metode Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpayment-method-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Metode Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type_id',
            'description:ntext',
            'method_name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MPaymentMethodType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'type_id' => $model->type_id]);
                 }
            ],
        ],
    ]); ?>


</div>
