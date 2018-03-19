<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblMapel */

$this->title = "Detail Mata Pelajaran #".$model->id_mapel;
$this->params['breadcrumbs'][] = ['label' => 'Mata-Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = "View";
$this->params['breadcrumbs'][] = $model->id_mapel;
?>
<div class="tbl-mapel-view">


    <p>
       
    </p>

    <div class="box box-primary">
        <div class="box-header with-border">
            Data Mata Pelajaran -  <?= Html::a('Update', ['update', 'id' => $model->id_mapel], ['class' => 'btn btn-primary btn-sm btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_mapel], [
            'class' => 'btn btn-danger btn-sm btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
             <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
         </div>
        </div>
        <div class="box-body">
            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_mapel',
            'nama_mapel',
            // 'id_guru',
            [
                'label' => 'Nama Guru',
                'format' => 'raw',
                'value' => date(format) //$model->idGuru->nama_guru,
            ]
        ],
    ]) ?>
        </div>
    </div>

</div>
