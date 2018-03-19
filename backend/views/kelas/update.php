<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblKelas */

$this->title = 'Update Kelas #' . $model->id_kelas;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = ['label' => $model->id_kelas, 'url' => ['view', 'id' => $model->id_kelas]];

?>
<div class="tbl-kelas-update">

    

    <?= $this->render('_form', [
        'model' => $model,'data' => $data,
    ]) ?>

</div>
