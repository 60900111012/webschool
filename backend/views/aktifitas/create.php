<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblAbsen */

$this->title = 'Absen Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Absens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-absen-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
