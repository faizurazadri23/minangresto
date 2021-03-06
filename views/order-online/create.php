<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnline */

$this->title = 'Create Order Online';
$this->params['breadcrumbs'][] = ['label' => 'Order Onlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-online-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
