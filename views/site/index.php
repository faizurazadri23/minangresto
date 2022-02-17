<?php

/** @var yii\web\View $this */

use PharIo\Manifest\Url;
use yii\bootstrap4\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Minang Resto</h1>

        <p class="lead">Rasa Kenikmatan Masakan Minang Yang Mendunia</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Pesan Sekarang Juga</a></p>
    </div>

    <div class="body-content">
        <div class="row">
        <?php foreach($dataMenu as $menu){  ?>
            <div class="col-lg-4">
                <div class="card" style="width:300px">
                    <?= Html::img($menu->photo_menu, ['width'   => '100%', 'height' => 250]) ?>
                    <!-- <img class="card-img-top" src="https://food.id/static/img/cover-fd.jpeg" alt="Card image" style="width:100%"> -->
                    <div class="card-body">
                    <h4 class="card-title"><?= $menu->nm_menu ?></h4>
                    <p><?= "Rp " . number_format($menu->harga, 2, ',', '.'); ?></p>
                    
                        <?= Html::a('Detail', ['detail'], ['class'=>'btn btn-info']) ?>
                        <?= Html::a('Beli >>', ['pesan'], ['class'=>'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <br>

        <?php } ?>
        </div>
    </div>
</div>
