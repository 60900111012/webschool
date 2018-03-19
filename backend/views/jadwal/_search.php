<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblJadwalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-jadwal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pelajaran') ?>

    <?= $form->field($model, 'hari') ?>

    <?= $form->field($model, 'jam_masuk') ?>

    <?= $form->field($model, 'jam_keluar') ?>

    <?php // echo $form->field($model, 'id_kelas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
