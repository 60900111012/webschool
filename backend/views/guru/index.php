<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblGuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Guru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-guru-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            Daftar Guru - <?= Html::a('Tambah Guru Baru', ['registrasi/guru'], ['class' => 'btn btn-success btn-sm btn-flat']) ?>
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

            'id_guru',
            'nama_guru',
            'status_guru',
            'pendidikan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
</div>
