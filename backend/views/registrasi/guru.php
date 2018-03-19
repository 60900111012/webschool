<?php



/* @var $this yii\web\View */
/* @var $model common\models\TblGuru */
/* @var $form ActiveForm */
$this->title = "Registrasi Guru";
$this->params['breadcrumbs'][] = "Registrasi";
$this->params['breadcrumbs'][] = ['label' => "Guru", 'url' => ['/guru']];

echo $this->render('_guru',['model' => $model]);
?>

