<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblAbsen */

$this->title = 'Update Tbl Absen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Absens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-absen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
