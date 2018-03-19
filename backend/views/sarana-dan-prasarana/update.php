<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblSp */

?>
<div class="tbl-sp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
