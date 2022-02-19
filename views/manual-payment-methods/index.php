<?php

use app\models\ManualPaymentMethods;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManualPaymentMethodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manual-payment-methods-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Jenis Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type_id',
            'heading',
            'description:ntext',
            'bank_info:ntext',
            'photo',
            //'create_at',
            //'update_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ManualPaymentMethods $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
