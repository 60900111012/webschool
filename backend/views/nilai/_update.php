<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model common\models\TblNilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-nilai-form">
    <div class="box box-primary">
        <div class="box-header with-border">
            Form Input Nilai
        </div>
        <div class="box-body">
             <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal','action' => 'df'],
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"col-md-4\">{error}</div>",],]); ?>
            <div class="panel_a_style panel_a ">
                        <?php
                            echo $form->field($model,'id_pelajaran',['labelOptions'=>['class' => 'col-md-4 control-label']])->widget(Select2::classname(),[
                                'name' => 'id_pelajaran',
                                'data' => ArrayHelper::map($mapel,'id_mapel','nama_mapel'),
                                'options' => ['multipel' => false,'placeholder' => 'Nama Pelajaran','class' => 'form-control','required','kelas'=>'option','id' => 'pelajaran'],
                                'pluginOptions' => ['allowClear' => true],
                            ])->label('Pelajaran');
                        ?>
            </div>
            <div id="div-kelas"  class="panel_a_style panel_a batas" >
                        <?php
                            echo $form->field($model,'id_kelas',['labelOptions'=>['class' => 'col-md-4 control-label']])->widget(Select2::classname(),[
                                'name' => "TblNilai[id_siswa]",
                                // 'data' => ArrayHelper::map($kelas->all(),'id_kelas','nama_kelas'),
                                'options' => ['multipel' => false,'placeholder' => 'Nama Kelas','class' => 'form-control','required','kelas'=>'option','id' => 'kelas'],
                                'pluginOptions' => ['allowClear' => true],
                            ])->label('Kelas');
                        ?>
            </div>
            <div id="div-siswa" class="panel_a panel_a_style batas" >
                 <?= $form->field($model, 'id_siswa',['labelOptions'=>['class' => 'col-md-4 control-label']])->widget(Select2::classname(),[
                        'name'=> 'id_siswa',
                        // 'data' => ArrayHelper::map(' '),
                        'options' => ['multipel' => false,'placeholder' => 'Pilih Siswa'],
                        'pluginOptions' => ['allowClear' => true],
                    ])->label('Nama Siswa') ?>
            </div>
            <div id="div-pil-nilai" class="panel_a panel_a_style batas" >
                        <?php echo $form->field($model,'jenis_nilai',['labelOptions'=>['class'=>'col-md-4 control-label']])->widget(Select2::classname(),[
                                'name' => 'jenis_nilai',
                                'data' => ['1' => 'Nilai 1','2' => 'Nilai 2','3' => 'Nilai 3','4' => 'Nilai 4','5' => 'Nilai 5','mid' => 'Nilai MID','akhir' => 'Nilai Final'],
                                'options' => ['multipel' => false,'placeholder' => 'Jenis Nilai','class' => 'form-control','required','id'=>'jenis_nilai'],
                                'pluginOptions' => ['allowClear' => true],
                            ]);
                        ?>
            </div>
            <div id="div-nilai" class="panel_a panel_a_style batas" >

                        <?php
                            echo $form->field($model,'nilai',['labelOptions'=>['class'=>'col-md-4 control-label']])->textInput(['type'=>'number','value'=>'0']);
                            // echo Html::input('number','nilai','0',['class' => 'form-control','id'=>'fieldNilai']);
                        ?>
            </div>
            <div class="panel_a panel_a_style batas">
                <div class="form-group">
                    <div class="col-md-4"></div>
                    <?php echo Html::submitButton( 'Save', ['class' => 'btn btn-success','id'=>'save']) ?>
                </div>
            </div>
        </div>
    </div>
   

   

    <?php //$form->field($model, 'id_pelajaran')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'id_kelas')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'nilai_1')->textInput() ?>

    <?php //$form->field($model, 'nilai_2')->textInput() ?>

    <?php //$form->field($model, 'nilai_3')->textInput() ?>

    <?php //$form->field($model, 'nilai_4')->textInput() ?>

    <?php //$form->field($model, 'nilai_5')->textInput() ?>

    <?php //$form->field($model, 'nilai_mid')->textInput() ?>

    <?php //$form->field($model, 'nilai_akhir')->textInput() ?>

    

    <?php ActiveForm::end(); ?>

</div>
<?php
//     $script = 
//     "
//     $('#pelajaran').change(function(){
//         if ($(this).val() != ''){
//             $.ajax({
//                 url : 'kelas?id_mapel='+$(this).val(),
//                 type : 'GET',
//                 datatype : 'JSON',
//                 success : function(a){
//                     var k = JSON.parse(a);
//                 var i = 0;
//                 var data = '';
//                    for (i=0; i< k.hasil.length; i++){
//                     data = data+'<option value='+k.hasil[i].id_kelas+'>'+k.hasil[i].nama_kelas+'</option>';
//                    }
//                    $('#kelas').html('<option></option>'+data);
//                 }
//             })
//             $('#div-kelas').show();
//         }
//         else{
//             $('#div-kelas').hide();   
//         }
//     })
//     $('#kelas').change(function(){
//         if ($(this).val() != ''){
//             $.ajax({
//                 url : 'data?id_kelas='+$(this).val(),
//                 type : 'GET',
//                 cache : false,
//                 datatype : 'JSON',
//                 success : function(data){
//                     var a = JSON.parse(data);
//                     var i = 0;
//                     var kl = '';
//                     $('#nilaiform-id_siswa').html('');
//                     for (i = 0; i < a.kelas.length; i++){
//                        kl = kl + '<option value='+a.kelas[i].id+'>'+a.kelas[i].nama+'</option>';
//                     }
//                     $('#nilaiform-id_siswa').html('<option></option>'+kl);
//                 }
//             })
//             $('#div-siswa').css('display','block');   
//         }
//         else{
//             $('#div-siswa').css('display','none');
//             $('#div-pil-nilai').hide();
//             $('#nilai').css('display','none'); 
//         }
//     });
//     $('#nilaiform-id_siswa').change(function(){
//         if ($(this).val() != ''){
//             $('#div-pil-nilai').show();
//         }
//         else{
//             $('#div-pil-nilai').show();
//         }
//     });
//     $('#jenis_nilai').change(function(){
//         if ($(this).val()!= ''){
//             $('#div-nilai').show();
//         }
//         else{
//             $('#div-nilai').hide();
//         }
//     });
//     $('#nilaiform-nilai').change(function(){
//         if ($(this).val() != ''){
//             $('#save').show();
//         }
//         else{
//             $('#save').hide();
//         }
//     })
//     $('#save').click(function(){
//         $.ajax({
//             url : 'create',
//             type : 'POST',
//             data : $('#w0').serialize(),
//             datatype : 'JSON',
//             success : function(data)
//             {
//                 var a = JSON.parse(data)
//                 $('#1').text(a.hasil.nilai_1);
//                 $('#2').text(a.hasil.nilai_2);
//                 $('#3').text(a.hasil.nilai_3);
//                 $('#4').text(a.hasil.nilai_4);
//                 $('#5').text(a.hasil.nilai_5);
//                 $('#mid').text(a.hasil.nilai_mid);
//                 $('#final').text(a.hasil.nilai_akhir);
//                 $('#akhir').text(a.nilai_akhir);
//             }
//         })
//        $('#table').css('display','block');
//     })"; 
// //JS;
// $this->registerJs($script,View::POS_END);
?>
