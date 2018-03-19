<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblMapelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Mata Pelajaran';
$this->params['breadcrumbs'][] = 'Mata-pelajaran';
?>
<div class="tbl-mapel-index">

    <p>
       
    </p>
    <div class="box box-primary">
        <div class="box-header with-border">
            Table Mata Pelajaran -  <?= Html::a('Tambah Mata Pelajaran', ['create'], ['class' => 'btn btn-success btn-sm btn-flat']) ?>
             <div class="box-tools pull-right">
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

            'id_mapel',
            'nama_mapel',
            'id_guru',
            'semester',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>  
        </div>
    </div>
</div>
