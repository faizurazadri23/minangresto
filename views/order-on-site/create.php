<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnSite */

$this->title = 'Create Order On Site';
$this->params['breadcrumbs'][] = ['label' => 'Order On Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-on-site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
