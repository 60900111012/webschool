<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\NilaiForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = 'Nilai';
?>
<div class="tbl-user-index">

    <div class="box box-primary">
        <div class="box-header with-border">
            Daftar Pengguna
        </div>
        <div class="box-body">
            <?= 
            GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
          [
          	'label' => 'Pelajaran',
          	'value' => function ($model)
          	{
          		return $model->idPelajaran->nama_mapel;
          	}
          ],
          [
            'label' => 'Nilai',
            'value' =>function($model)
            {
              
              return NilaiForm::akumulasi(['id_siswa' => Yii::$app->user->id,'id_pelajaran'=>$model->id_pelajaran]);
            }
          ],
          [
            'label' => 'Grade',
            'value'=> function($model)
            {
              return NilaiForm::garade();
            }
          ]
          // 'jam_masuk',
          // 'jam_keluar',
        ],
    ]);?>
        </div>
    </div>
</div>
<?php
    $script = <<< JS
$(document).ready(function(){
   
}); 
JS;
$this->registerJs($script);
?>
