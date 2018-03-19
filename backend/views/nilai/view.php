<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblNilai */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-nilai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_siswa',
            'id_pelajaran',
            'id_kelas',
            'nilai_1',
            'nilai_2',
            'nilai_3',
            'nilai_4',
            'nilai_5',
            'nilai_mid',
            'nilai_akhir',
        ],
    ]) ?>

</div>
