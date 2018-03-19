<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblNilai */

$this->title = 'Tambah Nilai Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Create";
?>
<div class="tbl-nilai-create">

    <?= $this->render('_form', [
        'model' => $model,'mapel' =>$mapel,
    ]) ?>

</div>
