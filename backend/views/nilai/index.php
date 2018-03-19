<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\NilaiForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblNilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Siswa';
$this->params['breadcrumbs'][] = "Nilai";
?>
<div class="tbl-nilai-index">


    <p>
        
    </p>
    <div class="box box-primary">
        <div class="box-header with-border">
            Daftar Nilai Siswa - <?= Html::a('Create Tbl Nilai', ['create'], ['class' => 'btn btn-success btn-sm btn-flat']) ?> 
        </div>
        <div class="box-body">
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_siswa',
            [
                'label' => 'Nama Siswa',
                'value' => function ($model)
                {
                    return $model->idSiswa->nama_siswa;      
                }
            ],
            [
                'label' => 'Pelajaran',
                'value' => function ($model)
                {
                    return $model->idPelajaran->nama_mapel;
                }
            ],
            [
                'label' => 'Kelas',
                'value' => function ($model)
                {
                    return $model->idKelas->nama_kelas;
                }
            ],
            [
                'label' => 'Nilai',
                'value' => function ($model)
                {
                     return NilaiForm::akumulasi(['id'=>$model->id]);
                }
            ],
            [
                'label' => 'Nilai Grade',
                'value' => function()
                {
                    return NilaiForm::garade();
                }
            ],
            // 'nilai_2',
            // 'nilai_3',
            // 'nilai_4',
            // 'nilai_5',
            // 'nilai_mid',
            // 'nilai_akhir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>        
        </div>
    </div>
    
</div>
