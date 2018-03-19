<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblSiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-siswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_siswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_siswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Protestan' => 'Protestan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
