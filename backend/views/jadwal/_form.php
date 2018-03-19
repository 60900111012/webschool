<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\TblJadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form Jadwal</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
         </div>
    </div>
        <!-- /.box-header -->
    <div class="box-body">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"col-md-4\">{error}</div>",],]); ?>

    <div class="panel_a panel_a_style">
        <?= $form->field($model, 'id_pelajaran',['labelOptions' => ['class' => 'col-md-4 control-label']])->widget(Select2::classname(),[
                'name' => 'id_pelajaran',
                'data' => ArrayHelper::map($mapel->find()->all(),'id_mapel','nama_mapel'),
                'options' => ['multiple' => false,'placeholder' => 'Pilih Id Pelajaran'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
    </div>
    <div class="panel_a panel_a_style batas">
        <?= $form->field($model, 'hari',['labelOptions'=>['class' => 'col-md-4 control-label']])->widget(Select2::classname(),[
            'name' => 'hari',
            'data' => ['Senin'=>'Senin','Selasa' => "Selasa",'Rabu' => 'Rabu','Kamis' => 'Kamis',"Jum'at"=>"Jum'at","Sabtu"=>"Sabtu"],
            'options' => ['multiple' => false, 'placeholder' => 'Pilih Hari'],
            'pluginOptions' => ['allowClear' => true]
        ]) ?>
    </div>
    <div class="panel_a_style panel_a batas">
        <?= $form->field($model, 'jam_masuk',['labelOptions' => ['class' => 'col-md-4 control-label']])->widget(
        TimePicker::className(),[
                        'name' => 'jam_masuk', 
                        'pluginOptions' => [
                            'showSeconds' => true
                        ]
                    ]
    ) ?>
    </div>
    <div class="panel_a panel_a_style batas">
        <?= $form->field($model, 'jam_keluar',['labelOptions' => ['class' => 'col-md-4 control-label']])->widget(
        TimePicker::className(),[
                        'name' => 'jam_keluar', 
                        'pluginOptions' => [
                            'showSeconds' => true
                        ]
                    ]
    ) ?>        
    </div>
    <div class="panel_a_style panel_a batas">
        <?= $form->field($model, 'id_kelas',['labelOptions'=>['class' => 'col-md-4 control-label']])->textInput(['maxlength' => true])->widget(Select2::classname(),[
                'data' => ArrayHelper::map($kelas->find()->all(),'id_kelas','nama_kelas'),
                'options' => ['multiple' => false,'placeholder' => 'Pilih Kelas'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
    </div>
    <div class="col-md-4"></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
     
    <div class="box-footer">

    </div>
 </div>
