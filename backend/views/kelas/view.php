<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblKelas */

$this->title = "Kelas ID #" .Html::encode($model->id_kelas);
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = "View";
$this->params['breadcrumbs'][] = $model->id_kelas;
?>
<div class="tbl-kelas-view">


    <div class="box box-primary">
        <div class="box-header with-border"> - Detail Kelas - <?= Html::a('Update', ['update', 'id' => $model->id_kelas], ['class' => 'btn btn-primary btn-flat btn-sm']) ?> <?= Html::a('Delete', ['delete', 'id' => $model->id_kelas], [
            'class' => 'btn btn-danger btn-flat btn-sm',
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
            'id_kelas',
            'nama_kelas',
            'id_guru',
        ],
    ]) ?>
        </div>
     </div>
</div>
