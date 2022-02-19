<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = $model->nm_menu;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if(!Yii::$app->user->isGuest){
    ?>

        <p>
            <?= Html::a('Update', ['update', 'kd_menu' => $model->kd_menu], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'kd_menu' => $model->kd_menu], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php } 
        else{

        
    
    ?>
        <?= Html::a('Pesan', ['pesan', 'kd_menu' => $model->kd_menu], ['class' => 'btn btn-warning']) ?>
        <br>
    <?php }?>
   
        </br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_menu',
            'nm_menu',
            'harga',
            'kd_kategori',
            [
                'attribute' => 'photo_menu',
                'format'    => 'html',
                'value'     => Html::img(Url::base(). '/'. $model->photo_menu)
            ]
        ],
    ]) ?>

</div>
