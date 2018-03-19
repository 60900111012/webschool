<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblAbsenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-absen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_guru') ?>

    <?= $form->field($model, 'id_siswa') ?>

    <?= $form->field($model, 'jam') ?>

    <?= $form->field($model, 'tgl') ?>

    <?php // echo $form->field($model, 'h1') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
