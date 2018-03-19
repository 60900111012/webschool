<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblJadwal */

$this->title = 'Tambah Jadwal Baru';
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Create";
?>
<div class="tbl-jadwal-create">

    <?= $this->render('_form', [
        'model' => $model,'kelas' => $kelas,'mapel' => $mapel,
    ]) ?>

</div>
