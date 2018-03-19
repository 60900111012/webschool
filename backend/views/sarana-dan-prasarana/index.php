<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblSpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Sps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Sp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            [
              'label' => 'Gambar',
              'format' => 'image',
              'value' => function($value){
                return Yii::getAlias('@web').'/img/'.$value->foto;
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
