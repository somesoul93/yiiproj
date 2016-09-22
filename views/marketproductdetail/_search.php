<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarketProductdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="market-productdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'idproduct') ?>

    <?= $form->field($model, 'variant1') ?>

    <?= $form->field($model, 'variant2') ?>

    <?php // echo $form->field($model, 'variant3') ?>

    <?php // echo $form->field($model, 'variant4') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'idsupplier') ?>

    <?php // echo $form->field($model, 'minorder') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'weightunit') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
