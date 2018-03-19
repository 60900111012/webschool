<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblKelas */

$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Create";

?>
<div class="tbl-kelas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'data'=>$data
    ]) ?>

</div>
