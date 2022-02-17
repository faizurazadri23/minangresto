<?php

use app\models\Kategori;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Kategori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kd_kategori',
            'nm_kategori',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kategori $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kd_kategori' => $model->kd_kategori]);
                 }
            ],
        ],
    ]); ?>


</div>
