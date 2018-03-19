    <?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblKelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = "Tabel Kelas";
$this->params['breadcrumbs'][] = "Kelas";
?>
<div class="tbl-kelas-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            Daftar Kelas - <?= Html::a(' <i class="fa fa-fw fa-plus-square"></i> Tambah Kelas Baru', ['create'], ['class' => 'btn btn-success btn-flat btn-sm']) ?>
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
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kelas',
            'nama_kelas',
            'id_guru',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                        'view' => function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title' => 'Detail']);
                        },
                        'update' => function($url,$model,$key){
                            $url = ["update?id=".$model->id_kelas."&id_guru=".$model->id_guru];
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title' => 'Ubah']);
                        },
                        'delete' => function($url,$model){
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,['title' => 'Hapus','data-method' => 'post','data' => ['confirm' => "Anda Yakin Ingin Menghapus Kelas Ini ?"]]);
                        }
                ],
            ],
        ],
    ]);
    ?>
        </div>
    </div>
</div>

