<?php

use app\models\Carts;
use yii\bootstrap4\ActiveForm;
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
        if(Yii::$app->user->identity->user_type==="admin"){
    ?>

        <p>
            <?= Html::a('Update', ['update', 'kd_menu' => $model->kd_menu], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'kd_menu' => $model->kd_menu], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Anda yakin ingin menghapus item ini?',
                    'method' => 'post',
                ],
            ]) ?>

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
                            'value'     => Html::img(Url::base(). '/'. $model->photo_menu, ['width'   => '100%', 'height' => 250])
                        ]
                    ],
                ]) ?>
        </p>
    <?php } 
        else if(Yii::$app->user->identity->user_type==="customer" || Yii::$app->user->identity->user_type==="staf"){    
    ?>
        <?php $form = ActiveForm::begin(
            ['action' =>['/carts/create']]
        ); 
            $model_cart = new Carts();
            
        ?>
            
            <?= $form->field($model_cart, 'quantity')->textInput(['placeholder'    => 'Jumlah Pesanan']) ?>
            <?= $form->field($model_cart, 'user_id')->textInput(['placeholder'    => 'ID User', 'readOnly' => true, 'value' => Yii::$app->user->identity->id]) ?>
            <?= $form->field($model_cart, 'kd_menu')->textInput(['placeholder'    => 'Kode Menu', 'readOnly' => true, 'value' => $model->kd_menu]) ?>
            <?= $form->field($model_cart, 'price')->textInput(['placeholder'    => 'Harga Menu', 'readOnly' => true, 'value' => $model->harga]) ?>

        <br>

        <div class="form-group">
        <?= Html::submitButton('Tamba ke Keranjang', ['class' => 'btn btn-success']) ?>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Detail Menu
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?= $model->nm_menu?> | <?= $model->kd_menu?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $model->deskripsi?> dengan harga <?= $model->harga?>
                <p><?= Html::img(Url::base(). '/'. $model->photo_menu, ['width'   => '100%', 'height' => 250])?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                
            </div>
            </div>
        </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?php }?>
</div>
