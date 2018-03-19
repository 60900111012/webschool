<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblGuru */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tbl-guru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_guru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_guru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_guru')->dropDownList([ 'Honor' => 'Honor', 'PNS' => 'PNS', ], ['prompt' => ' -- Pilih Status --']) ?>

    <?= $form->field($model, 'pendidikan')->dropDownList([ 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3', 'D3' => 'D3', ], ['prompt' => ' -- Pilih Pendidikan --']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
