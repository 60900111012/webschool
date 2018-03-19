<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblNilaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_siswa') ?>

    <?= $form->field($model, 'id_pelajaran') ?>

    <?= $form->field($model, 'id_kelas') ?>

    <?= $form->field($model, 'nilai_1') ?>

    <?php // echo $form->field($model, 'nilai_2') ?>

    <?php // echo $form->field($model, 'nilai_3') ?>

    <?php // echo $form->field($model, 'nilai_4') ?>

    <?php // echo $form->field($model, 'nilai_5') ?>

    <?php // echo $form->field($model, 'nilai_mid') ?>

    <?php // echo $form->field($model, 'nilai_akhir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
