<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\TblMapel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mapel-form">
    <div class="box box-primary">
    	<div class="box-header with-border">
    		Form Mata Pelajaran
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
    	<?= $form->field($model, 'id_mapel',['labelOptions' => ['class' => 'col-md-4 control-label']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="panel_a_style panel_a batas">
    	<?= $form->field($model, 'nama_mapel',['labelOptions' => ['class' => 'col-md-4 control-label']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="panel_a_style panel_a batas">
    	    <?= $form->field($model, 'id_guru',['labelOptions' => ['class'=> 'col-md-4 control-label' ]])->widget(Select2::classname(),[
    	    	'data' => ArrayHelper::map($guru->find()->all(),'id_guru','nama_guru'),
    	    	'options' => ['multiple' => false,'placeholder' => 'Pilih Guru'],
    	    	'pluginOptions' => ['allowClear' => true]
    	    ]) ?>
    </div>
    <div class="panel_a panel_a_style batas">
        <?=
            $form->field($model,'semester',['labelOptions'=>['class' => 'col-md-4 control-label']])->widget(Select2::classname(),['data'=>['1'=>
                'semester 1','2'=>'semester 2']])
        ?>
    </div>

    <div class="col-md-4"></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    	</div>
    </div>
    

</div>
