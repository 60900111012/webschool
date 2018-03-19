<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\TblSiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-siswa-form">
    <div class="box box-primary">
        <div class="box-header with-primary">
            Form Registrasi Siswa
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-remove"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"col-md-4\">{error}</div>",],
    ]); ?>
            <div class="panel_a panel_a_style">
                <?= $form->field($user, 'id',['labelOptions' => ['class' => 'control-label col-md-4']])->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>
            </div>
            <div class="panel_a panel_a_style batas">
                <?= $form->field($model, 'id_kelas',['labelOptions' => ['class' => 'control-label col-md-4']])->widget(Select2::classname(),[
            'name' => 'hari',
            'data' => ArrayHelper::map($kelas->find()->all(),'id_kelas','nama_kelas'),
            'options' => ['multiple' => false, 'placeholder' => 'Pilih Kelas'],
            'pluginOptions' => ['allowClear' => true],
        ]) ?>
            </div>
        <div class="panel_a panel_a_style batas">
            <?= $form->field($model, 'nama_siswa',['labelOptions'=>['class' => 'control-label col-md-4']])->textInput(['maxlength' => true]) ?>
        </div>
        <div class="panel_a panel_a_style batas">
            <?= $form->field($model, 'alamat',['labelOptions'=>['class' => 'control-label col-md-4']])->textarea(['rows' => 6]) ?>
        </div>
         <div class="panel_a panel_a_style batas">
            <?= $form->field($model, 'agama',['labelOptions'=>['class' => 'control-label col-md-4']])->dropDownList([ 'Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Protestan' => 'Protestan', ], ['prompt' => '']) ?>
        </div>
         <div class="panel_a panel_a_style batas">
            <?= $form->field($model, 'nama_ibu',['labelOptions'=>['class' => 'control-label col-md-4']])->textInput(['maxlength' => true])  ?>
        </div>
        <div class="panel_a panel_a_style batas">
            <?= $form->field($model, 'nama_ayah',['labelOptions'=>['class' => 'control-label col-md-4']])->textInput(['maxlength' => true])  ?> 
        </div> 

        <div class="col-md-4"></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
