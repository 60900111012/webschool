<?php
	namespace backend\controllers;
// use yii\rest\Controller;
use Yii;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\Response;
use common\models\TblJadwal;
use common\models\TblAbsen;
	class ServiceController extends \yii\rest\Controller
	{
		public function behaviors(){
		return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'login' => ['POST'],
                ],
            ],
            [
            	'class' => 'yii\filters\ContentNegotiator',
            	//'only'=> ['insert'],
            	'formats' => [
            		'application/json' => Response::FORMAT_JSON],
            ]
        ];
    }
    public function actionLogin()
    {
    	$model = new LoginForm();
    	$data = array();
    	if ($model->load(Yii::$app->request->post())&& $model->login()){
    		  $a= Yii::$app->request->post();
    		  $model->attributes = $a;
    		  array_push($data,array('val' =>$model->hasErrors()));
					array_push($data,array('status' => Yii::$app->user->identity->status));
					array_push($data,array('foto' => Yii::$app->user->identity->foto ));
					array_push($data,array('nama' => Yii::$app->user->identity->nama));
    	}
    	else{
    		array_push($data,array('val' =>$model->hasErrors()));
    	}
    	echo json_encode(array('hasil' =>$data,));
    }

		public function actionGetMapel($id_siswa){
			echo json_encode(array('data' => $id_siswa));
		}

		public function actionAmbilSiswa($id_guru){

			$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
			$hari = $array_hari[date('N')];
			$guru = TblJadwal::find('*')->leftJoin('tbl_mapel','tbl_mapel.id_mapel = tbl_jadwal.id_pelajaran')->where(['hari' => $hari,'tbl_mapel.id_guru'=>$id_guru])->one();
			// 'hari'=> $hari,

			// array_push($data,array('nama_mapel' => $guru->idPelajaran->nama_mapel));
			if ($guru != null){
				$mapel[] = array('id_mapel' =>  $guru->idPelajaran->id_mapel,'nama_mapel'=>$guru->idPelajaran->nama_mapel);
				$siswa = array();
				foreach ($guru->idKelas->tblSiswas as $d){
					$siswa[]=array('id_siswa'     => $d->id_siswa,'nama_siswa'=>$d->nama_siswa,'foto'=>$d->foto);
				}
				$id = array();
				for ($i=0; $i < 5 ; $i++) {
					$id[] = array('id_siswa' => $i,'nama_siswa' => $i."as" );
				}
				$data = array(array("pelajaran" =>$mapel,'siswa' => $siswa));
			}
			else{
				 $data[] = array('pelajaran' => null ,'siswa'=>null );
			}
			echo json_encode(array('val' => $data));
		}
		// public function actionAbsen(){
    //
		// }
		public function actionKirimAbsen(){
			$i=0;

			$file = file_get_contents("php://input");
			$json = json_decode($file);

			$pesan = "kosong";
			foreach ($json as $value) {
				foreach ($value[0]->data as $key => $v) {
					$model = new TblAbsen();
      		$model->id_siswa = $v->id_siswa;
					$model->id_pelajaran = $v->id_mapel;
					$model->jam = $v->jam;
					$model->tgl = $v->tgl;
					$model->h1 = $v->status;
					if ($model->save()){
						$pesan = true;
					}
					else {
						$pesan = false;
					}
				}
			}
			echo json_encode(array('value' =>array(array('respon' => $pesan ))));
		}
	}
?>
