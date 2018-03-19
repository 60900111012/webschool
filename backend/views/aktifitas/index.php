<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblAbsenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Absen Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-absen-index">


    <p>
        <?= Html::a('Mulai Absen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box box-priamry">
        <div class="box-header with-border">
            Absen Siswa
        </div>
        <div class="box-body">
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'id_pelajaran',
            'id_siswa',
            'jam',
            'tgl',
            // 'h1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
</div>
