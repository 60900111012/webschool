<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblPersentase */

$this->title = 'Create Tbl Persentase';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Persentases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-persentase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
