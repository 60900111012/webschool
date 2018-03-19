<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\TblAbsen */

$this->title = "Detail Absen";
$this->params['breadcrumbs'][] = ['label' => 'Absens', 'url' => ['index']];
$this->params['breadcrumbs'][] = "view";
$this->params['breadcrumbs'][] = $model->id;
?>
<div class="tbl-absen-view">

    <p>
        
       
    </p>

    <div class="box box-primary">
        <div class="box-header with-border">
            Detail Abseb - <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-flat']) ?>
             <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
        <div class=" box-body">
            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Pelajaran',
                'format' => 'raw',
                'value' => function($data)
                {
                    return $data->idPelajaran->nama_mapel;
                },
            ],
            'id_siswa',
            [
                'label' => 'Nama Siswa',
                'value' => function($data)
                {
                    return $data->idSiswa->nama_siswa;
                }
            ],
            [
                'label' => 'Kelas',
                'value' => function($data)
                {
                    return $data->idSiswa->idKelas->nama_kelas;
                }
            ],
            [
                'label' => 'Alfa',
                'value' => function($data)
                {
                    return $data->find()->where(['h1' => 'A','id_siswa' => $data->id_siswa])->count();
                }
            ],
            [
                'label' => 'Hadir',
                'value' => function($data)
                {
                     return $data->find()->where(['h1' => 'H','id_siswa' => $data->id_siswa])->count();
                }
            ],
            [
                'label' => 'Jumlah Pertemuan',
                'value' => function($data)
                {
                     return $data->find()->leftJoin('tbl_mapel','tbl_mapel.id_mapel = tbl_absen.id_pelajaran')->where(['tbl_mapel.id_guru' => Yii::$app->user->identity->id])->count();
                }
            ],
        ],
    ]) ?>
        </div>
    </div>
    

</div>
