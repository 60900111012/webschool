<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblGuru */

$this->title = "Guru ID #".$model->id_guru;
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = "View";
$this->params['breadcrumbs'][] = $model->id_guru;
?>
<div class="tbl-guru-view">
    <p>
       
    </p>
    <div class="box box-primary">
        <div class="box-header with-border">
            Detail Guru -  <?= Html::a('Update', ['update', 'id' => $model->id_guru], ['class' => 'btn btn-primary btn-sm btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_guru], [
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
            'id_guru',
            'nama_guru',
            'status_guru',
            'pendidikan',
        ],
    ]) ?>  
        </div>
    </div>
</div>
