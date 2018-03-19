<?php

	/**
	* 
	*/
	namespace backend\controllers;
	use Yii;
	use yii\web\Controller;
	use common\models\TblKelas;

	use common\models\TblSiswa;
	use common\models\TblMapel;
	use common\models\TblJadwal;
	use common\models\TblNilai;
	use yii\data\ActiveDataProvider;
	class DataSiswaController extends Controller
	{
		
		public function actionJadwal()
		{
			$model = TblJadwal::find()->joinWith(['idKelas' => function ($r)
			{
				$r->joinWith(['tblSiswas' => function ($d)
				{
					$d->where(['tbl_siswa.id_siswa' => Yii::$app->user->id]);
				}]);
			}]);
			$dataProvider = new ActiveDataProvider(['query'=>$model]);
			return $this->render('jadwal',['dataProvider' => $dataProvider]);
		}
		public function actionPelajaran()
		{
			$model = TblMapel::find()->joinWith(['tblJadwals' => function ($q)
			{
				$q->joinWith(['idKelas' => function ($r)
				{
					$r->joinWith(['tblSiswas' => function ($s)
					{
						$s->where(['tbl_siswa.id_siswa' => Yii::$app->user->id]);
					}]);
				}]);
			}]);
			$dataProvider = new ActiveDataProvider(['query' => $model]);
			return $this->render('pelajaran',['dataProvider' => $dataProvider]);
		}
		public function actionNilai()
		{
			$model = TblNilai::find()->joinWith(['idSiswa' => function ($v)
			{
				$v->where(['tbl_siswa.id_siswa' => Yii::$app->user->id]);
			}]);
			$dataProvider = new ActiveDataProvider(['query' => $model]);
			return $this->render('nilai',['dataProvider' => $dataProvider]);
		}
	}
?>