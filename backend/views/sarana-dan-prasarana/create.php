<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblSp */

$this->title = 'Create Tbl Sp';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
