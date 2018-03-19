<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblJadwal */

$this->title = 'Update Tabel Jadwal #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];

?>
<div class="tbl-jadwal-update">


    <?= $this->render('_form', [
        'model' => $model,'mapel' => $mapel,'kelas' => $kelas,
    ]) ?>

</div>
