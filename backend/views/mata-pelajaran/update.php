<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblMapel */

$this->title = 'Update Data Pelajaran #' . $model->id_mapel;
$this->params['breadcrumbs'][] = ['label' => 'Mata-Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = ['label' => $model->id_mapel, 'url' => ['view', 'id' => $model->id_mapel]];

?>
<div class="tbl-mapel-update">

    <?= $this->render('_form', [
        'model' => $model,'guru' => $guru,
    ]) ?>

</div>
