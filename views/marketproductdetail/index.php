<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MarketProductdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Market Productdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-productdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Market Productdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'idproduct',
            [
            'attribute' => 'product',
            'value' => 'idproduct'
            ],
            'variant1',
            'variant2',
            // 'variant3',
            // 'variant4',
            // 'city',
            // 'idsupplier',
            // 'minorder',
            // 'stock',
            // 'weight',
            // 'weightunit',
            // 'description:ntext',
            // 'created_at',
            // 'updated_at',
            // 'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>
<?php Pjax::end(); ?></div>
