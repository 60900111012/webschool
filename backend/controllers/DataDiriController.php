<?php

	namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\TblGuru;
use common\models\TblSiswa;
use common\models\TblKelas;

use yii\web\NotFoundHttpException;
	class DataDiriController extends Controller
	{
		public function actionIndex()
		{
			if (Yii::$app->user->identity->guru){
				$this->redirect(['guru']);
			}
			elseif (Yii::$app->user->identity->siswa){
				$this->redirect(['siswa']);
			}
		}
		public function actionSiswa()
		{
			$kelas = new TblKelas();
			$model = TblSiswa::find()->where(['id_siswa' => Yii::$app->user->id])->one();
			return $this->render('view_siswa',['model'=>$model,'kelas'=>$kelas]);
		}
		public function actionGuru()
		{
			$model = TblGuru::find()->where(['id_guru' => Yii::$app->user->id])->one();
			return $this->render('view_guru',['model'=>$model]);
		}
		public function actionUbahSiswa()
		{
			$model = TblSiswa::find()->where(['id_siswa' => Yii::$app->user->id])->one();
			if ($model->load(Yii::$app->request->post())){
				if ($model->save()){
					$this->redirect(['siswa']);
				}
			}
			return $this->render('form_siswa',['model'=>$model]);
		}
		public function actionUbahGuru()
		{
			$model = TblGuru::find()->where(['id_guru' => Yii::$app->user->id])->one();
			if ($model->load(Yii::$app->request->post())){
				if ($model->save()){
					$this->redirect(['/data-diri']);
				}
			}
			return $this->render('form_guru',['model'=>$model]);
		}
	}
?>