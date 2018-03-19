<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = 'Daftar Pelajaran';
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
        'id_mapel',
        'nama_mapel',
        [
          'label' => 'Guru',
          'value' => function ($model)
          {
            if (is_null($model->idGuru)){
              return null;
            }
            else{
              return $model->idGuru->nama_guru;
            }

          }
        ],
        [
          'label' => 'Foto',
          'format' => 'html',
          'value' => function($model)
          {
            if (is_null($model->idGuru)) {
              return '*Kosong';
            }
            else{
              return Html::img(Yii::getAlias('@web').'/img/'.$model->idGuru->foto,
                ['width' => '70px']);
             
            }
          }
        ]
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
