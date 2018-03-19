<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblSiswa */

$this->title = 'Create Tbl Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-siswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
