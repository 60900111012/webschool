<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\TblKelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-default">
	<div class="box-header with-border">
        <h3 class="box-title"> - Data Siswa</h3>
        <div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
         </div>
    </div>
        <!-- /.box-header -->
	<div class="box-body">
		<div class="row">
          	<div class="col-md-12">
            	<?php $form = ActiveForm::begin([
                                    'options' => ['class' => 'form-horizontal'],
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"col-md-4\">{error}</div>",],
                ]); ?>
               <div class="panel_a panel_a_style">
                    <?=
                    $form->field($model,'id_kelas',['labelOptions'=>['class'=>'control-label col-md-4']]);
                ?>
               </div>
               <div class="panel_a panel_a_style batas">
                   <?=
                    $form ->field($model,'nama_kelas',['labelOptions'=>['class' => 'control-label col-md-4']])
                   ?>
               </div>
               <div class="panel_a panel_a_style batas end">
                   <?=
                    $form->field($model,'id_guru',['labelOptions'=>['class'=>'control-label col-md-4']])->widget(Select2::classname(),
                        [
                        'data' => ArrayHelper::map($data->find()->all(),'id_guru','nama_guru'),'language'=>'ind',
                        'options' => ['placeholder' => 'Pilih ID Guru','class'=>'form-control'],
                        'pluginOptions' => ['allowClear'=>true]]);
                   ?>
               </div>
            	
    			<!--<?= $form->field($model, 'nama_kelas')->textInput(['maxlength' => true]) ?>
    			<?= $form->field($model, 'id_guru')->widget(Select2::classname(),[
    					// 'model' => ,
    					'data' => ArrayHelper::map($data->find()->all(),'id_guru','nama_guru'),
    					'language' => 'ind',
    					'options' => ['placeholder' => 'Pilih Id Guru','class'=> 'form-control'],
    					'pluginOptions' => [
        					'allowClear' => true
    					],]);
    			?> -->
                <div class="col-md-4"></div>
    			<div class="form-group">
       				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    			</div>
    			<?php ActiveForm::end(); ?>
    		</div>
    	</div>
    </div>
    <div class="box-footer">
      
    </div>
 </div>
