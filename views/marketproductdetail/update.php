<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarketProductdetail */

$this->title = 'Update Market Productdetail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Market Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="market-productdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
