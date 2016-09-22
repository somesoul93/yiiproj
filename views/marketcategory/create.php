<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarketCategory */

$this->title = 'Create Market Category';
$this->params['breadcrumbs'][] = ['label' => 'Market Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
