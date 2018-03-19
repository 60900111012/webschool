<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblJadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jadwal';
$this->params['breadcrumbs'][] = "Jadwal";
?>
<div class="tbl-jadwal-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            Table Jadwal - <?= Html::a('Tambah Jadwal Baru', ['create'], ['class' => 'btn btn-success btn-sm btn-flat']) ?>
            <?= Html::a('Tampilkan Semua Jadwal',['semua-jadwal'],['class' => 'btn btn-primary btn-sm btn-flat'])?>
             <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
         </div>
        </div>
        <div class="box-body">
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pelajaran',
            'hari',
            'jam_masuk',
            'jam_keluar',
            [
                'attribute' => 'nama_kelas',
                'value' =>function($data)
                {
                    return $data->idKelas->nama_kelas;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
        </div>
    </div>    
</div>
