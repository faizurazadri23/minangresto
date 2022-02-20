<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;

$this->title = 'Minang Resto';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Minang Resto</h1>

        <p class="lead">Rasa Kenikmatan Masakan Minang Yang Mendunia</p>

        <p><a class="btn btn-lg btn-success" href="#">Pesan Sekarang Juga</a></p>
    </div>

    <div class="body-content">
        
        <div class="row">
        <?php foreach($dataMenu as $menu){  ?>
            
            <div class="col-lg-4">
                <br>
                <div class="card" style="width:300px; height:450px">
                    <?= Html::img($menu->photo_menu, ['width'   => '100%', 'height' => 250]) ?>
              
                    <div class="card-body">
                    <h4 class="card-title"><?= $menu->nm_menu ?></h4>
                    <p><?= "Rp " . number_format($menu->harga, 2, ',', '.'); ?></p>


                    <?php
                        if(Yii::$app->user->isGuest){

                        ?>
                            <?= Html::a('Detail', ['site/login'], ['class'=>'btn btn-primary'])?>
                            <?=  Html::a('Beli >>', ['site/login'], ['class'=>'btn btn-primary'])?>
                        <?php } else{
                            ?>
                            <?= Html::a('Detail', ['menu/view', 'kd_menu'=>$menu->kd_menu], ['class'=>'btn btn-primary'])?>
                            <?= Html::a('Beli >>', ['customers/create'], ['class'=>'btn btn-primary'])?>
                        <?php }
                    ?>
                     
                        
                        
                        
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
