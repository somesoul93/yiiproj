<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarketProductdetail */

$this->title = 'Create Market Productdetail';
$this->params['breadcrumbs'][] = ['label' => 'Market Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-productdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
