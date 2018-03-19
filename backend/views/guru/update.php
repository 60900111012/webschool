<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblGuru */

$this->title = 'Update Guru #' . $model->id_guru;
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = $model->id_guru;

?>
<div class="tbl-guru-update">



    <?= $this->render('/registrasi/_guru', [
        'model' => $model,
    ]) ?>

</div>
