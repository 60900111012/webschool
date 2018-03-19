<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblBeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Beritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-berita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Berita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judul',
            'isi:ntext',
            'tgl',
            [
              'label' => 'Gambar',
              'format' => 'image',
              'value' => function($d)
              {
                return Yii::getAlias('@web').'/img/'.$d->img;
              }
            ],
            // 'id_post',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
