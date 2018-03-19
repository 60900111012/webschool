<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblSiswa */

$this->title = "Detail Data Siswa";
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = "View";
$this->params['breadcrumbs'][] = $model->id_siswa;
?>
<div class="tbl-siswa-view">



    <p>
        
       
    </p>

    <div class="box box-primary">
        <div class="box-header with-border">
            Data Siswa - <?= Html::a('Update', ['ubah-siswa'], ['class' => 'btn btn-primary btn-sm btn-flat']) ?> 
        </div>
        <div class="box-body">
            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_siswa',
            [
                'label' => 'Nma',
                'format' => 'raw',
                'value' => $model->idKelas->nama_kelas,
            ],
            'nama_siswa',
            'alamat:ntext',
            'agama',
            'nama_ibu',
            'nama_ayah',
        ],
    ]) ?>
        </div>
    </div>

</div>
