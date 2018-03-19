<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblPersentase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-persentase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tugas')->textInput() ?>

    <?= $form->field($model, 'mid')->textInput() ?>

    <?= $form->field($model, 'final')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
