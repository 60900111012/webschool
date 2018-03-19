<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblMapel */

$this->title = 'Tambah Mata Pelajaran Baru ';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
?>
<div class="tbl-mapel-create">
    <?= $this->render('_form', [
        'model' => $model,'guru' => $guru
    ]) ?>

</div>
