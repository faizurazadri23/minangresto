<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderOnSite */

$this->title = 'Update Order On Site: ' . $model->order_id_onsite;
$this->params['breadcrumbs'][] = ['label' => 'Order On Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id_onsite, 'url' => ['view', 'order_id_onsite' => $model->order_id_onsite]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-on-site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
