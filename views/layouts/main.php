<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    if(Yii::$app->user->isGuest){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Home',             'url' => ['/']],
                ['label' => 'Tentang Kami',     'url' => ['/site/about']],
                ['label' => 'Hubungi Kami',   'url' => ['/site/contact']],
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Masuk', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }else if(Yii::$app->user->identity->user_type==="admin"){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Home',             'url' => ['/']],
                ['label' => 'Menu',             'url' => ['/menu/index']],
                ['label' => 'Kategori',          'url' => ['/kategori/index']],
                [
                    'label' => 'Pesanan',
                    'items' => [
                        ['label'    => 'Pesanan Online' , 'url' => ['/order-online/index']],
                        ['label'    => 'Pesanan Offline' , 'url' => ['/order-on-site/index']]
                    ]
                ],
                [
                    'label' => 'Metode Pembayaran',
                    'items' => [
                        ['label'    => 'Metode Pembayaran' , 'url' => ['/m-payment-method-type/index']],
                        ['label'    => 'Jenis Pembayaran' , 'url' => ['/manual-payment-methods/index']]
                    ]
                ],

                [
                    'label' => 'Daftar Pengguna',
                    'items' => [
                        ['label'    => 'Akun' , 'url' => ['/users/index']],
                        ['label'    => 'Pelanggan' , 'url' => ['/customers/index']]
                    ]
                ],
            
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Keluar (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }else if(Yii::$app->user->identity->user_type==="staf"){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Home',             'url' => ['/']],
                [
                    'label' => 'Pesanan',
                    'items' => [
                        ['label'    => 'Pesanan Online' , 'url' => ['/order-online/index']],
                        ['label'    => 'Pesanan Offline' , 'url' => ['/order-on-site/index']]
                    ]
                ],
                ['label' => 'Keranjang',     'url' => ['/carts/index?CartsSearch[user_id]=' . Yii::$app->user->identity->id]],              
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Keluar (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    } else if(Yii::$app->user->identity->user_type==="customer"){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Home',             'url' => ['/']],
                ['label' => 'Keranjang',     'url' => ['/carts/index?CartsSearch[user_id]=' . Yii::$app->user->identity->id]],
                [
                    'label' => 'Riwayat Pesanan',
                    'items' => [
                        ['label'    => 'Pesanan Online' , 'url' => ['/order-online/index']],
                        ['label'    => 'Pesanan Offline' , 'url' => ['/order-on-site/index']]
                    ]
                ],
                ['label' => 'Tentang Kami',     'url' => ['/site/about']],
                ['label' => 'Hubungi Kami',   'url' => ['/site/contact']],
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Masuk', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }
    
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Minang Resto <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
