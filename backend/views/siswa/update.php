<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblSiswa */

$this->title = 'Update Siswa #' . $model->id_siswa;
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = ['label' => $model->id_siswa, 'url' => ['view', 'id' => $model->id_siswa]];

?>
<div class="tbl-siswa-update">

    <?= $this->render('/registrasi/_form', [
        'model' => $model,'kelas' => $kelas,'user' => $user
    ]) ?>

</div>
