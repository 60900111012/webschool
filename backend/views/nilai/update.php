<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblNilai */

$this->title = 'Update Tbl Nilai: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-nilai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,'mapel' => $mapel
    ]) ?>

</div>
