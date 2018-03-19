<?php
	$this->title = "Registrasi Siswa";
$this->params['breadcrumbs'][] = "Registrasi";
$this->params['breadcrumbs'][] = ['label' => "Siswa", 'url' => ['/siswa']];

echo $this->render('_form',['model' => $model,'kelas' => $kelas,'user' => $user]);
?>