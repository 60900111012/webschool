<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="box box-primary">
        <div class="box-header with-border">
             Daftar Siswa -  <?= Html::a('Create Tbl Siswa', ['registrasi/siswa'], ['class' => 'btn btn-success btn-sm btn-flat']) ?>
            <div class="box-tool pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                     </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-remove"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
             <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_siswa',
            'id_kelas',
            'nama_siswa',
            'alamat:ntext',
            'agama',
            // 'nama_ibu',
            // 'nama_ayah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
<div class="tbl-siswa-index">
   

    <p>
       
    </p>
   
</div>
