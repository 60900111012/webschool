<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
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
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'password',
            'status',

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=>function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/user/view?id='.$model['id']]);
                    },
                    'update' => function($url,$model)
                    {
                        return  Html::a('<span class="glyphicon glyphicon-pencil"></span>',['/user/update?id='.$model['id']]);
                    },
                    'delete' => function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>','/user/delete?id='.$model['id'],['data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.',
                    'method' => 'post',]]);
                    }
                    
                ],
            ],
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
