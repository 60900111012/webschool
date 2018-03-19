<?php
    use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>
<div class="registrasi-guru">
	<div class="box box-primary">
		<div class="box-header with-border">
			Form Registrasi Guru
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
            	<?=
            		$form->field($model,'id_guru',['labelOptions' => ['class' => 'control-label col-md-4']])
            	?>
            </div>
            <div class="panel_a panel_a_style batas">
            	<?=
            		$form->field($model,'nama_guru',['labelOptions' => ['class' => 'control-label col-md-4']])
            	?>
            </div>
            <div class="panel_a panel_a_style batas">
            	<?=
            		$form->field($model,'status_guru',['labelOptions' => ['class' => 'control-label col-md-4']])->widget(
            				Select2::classname(),
            				[
            					'data' => ['Honor' => 'Honor','PNS' => 'PNS'],
            					'options' => ['placeholder' => ' - Pilih Status Guru - ','class' => 'form-control'],
            					'pluginOptions' => ['allowClear' => true],
            				] 
            			)
            	?>
            </div>
            <div class="panel_a panel_a_style batas">
                <?=
                    $form->field($model,'jk',['labelOptions' => ['class' => 'control-label col-md-4']])->widget(
                            Select2::classname(),
                            [
                                'data' => ['Laki-laki' => 'Laki-laki','Perempuan' => 'Perempuan'],
                                'options' => ['placeholder' => ' - Pilih Jenis Kelamin - ','class' => 'form-control'],
                                'pluginOptions' => ['allowClear' => true],
                            ] 
                        )
                ?>
            </div>
            <div class="panel_a panel_a_style batas">
                <?=
                    $form->field($model,'agama',['labelOptions' => ['class' => 'control-label col-md-4']])->widget(
                            Select2::classname(),
                            [
                                'data' => ['Islam' => 'Islam','Kristen' => 'Kristen','Hindu' => 'Hindu','Budha'=>'Budha','Protestan'=>'Protestan'],
                                'options' => ['placeholder' => ' - Pilih Jenis Kelamin - ','class' => 'form-control'],
                                'pluginOptions' => ['allowClear' => true],
                            ] 
                        )
                ?>
            </div>
            <div class="panel_a panel_a_style batas">
            	<?=
            		$form->field($model,'pendidikan',['labelOptions' => ['class' => 'control-label col-md-4']])->widget(
            				Select2::classname(),
            				[
            					'data' => ['S1' => 'Strata - 1','S2' => 'Strata - 2','S3' => 'Strata - 3','D3' => 'Diploma - 3'],
            					'options' => ['placeholder' => ' - Pilih Pendidikan - ','class' => 'form-control'],
            					'pluginOptions' => ['allowClear' => true],
            				] 
            			)
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
</div><!-- registrasi-guru -->