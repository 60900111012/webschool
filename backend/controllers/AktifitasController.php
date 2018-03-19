<?php

namespace backend\controllers;

use Yii;
use common\models\TblAbsen;
use common\models\TblAbsenSearch;
use common\models\TblJadwal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;



/**
 * AktifitasController implements the CRUD actions for TblAbsen model.
 */
class AktifitasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new TblAbsenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblAbsen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
    	$absen = TblAbsen::find()->where(['id_siswa' => $model->id_siswa]);
		$dataProvider = new ActiveDataProvider([
            'query' => $absen,
        ]);
        return $this->render('view', [
            'model' => $model,'dataProvider'=> $dataProvider
        ]);
    }

    /**
     * Creates a new TblAbsen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

    	if (Yii::$app->user->identity->admin == 'admin'){
    		echo "admin";
    	}
    	elseif (Yii::$app->user->identity->Status == 'Guru') {
    		$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
			  $hari = $array_hari[date('N')];
    		$guru = TblJadwal::find('*')->leftJoin('tbl_mapel','tbl_mapel.id_mapel = tbl_jadwal.id_pelajaran')->where(['hari'=> $hari,'tbl_mapel.id_guru'=>Yii::$app->user->id])->all();

    		// foreach ($guru as $k){
    		// 	echo $k->idKelas->nama_kelas.$k->idPelajaran->id_mapel."<br>";
    		// 	foreach ($k->idKelas->tblSiswas as $m){
    		// 		echo $m->id_siswa.$k->idPelajaran->id_mapel."<br>";
    		// 	}

    		//}
    	}

    	 return $this->render('create',['model' => $guru]);
    }

    /**
     * Updates an existing TblAbsen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionAbsen($id,$mapel,$sts){
    	$absen = TblAbsen::find()->where(['id_siswa' => $id,'id_pelajaran'=>$mapel,'tgl' => date('Y-m-d'),])->count();
    	if ($absen == 0){
    		$new = new TblAbsen();//::find()->where(['id_siswa' => $id,'id_pelajaran'=>$mapel,'h1'=>$sts,'tgl' => date('d-m-Y')])->all();
    		$new->id_siswa = $id; $new->id_pelajaran = $mapel;
    		$new->jam = date('H:i:s'); $new->tgl = date('Y-m-d'); $new->h1 = $sts;

    		if ($new->save()){
    			echo json_encode(array('hasil' => "<div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i></h4>
              </div>"));
    		}
        // echo json_encode("Tidak Ada User");
    	}
    	else
    	{

    		$new = TblAbsen::find()->where(['id_siswa' => $id,'id_pelajaran'=>$mapel,'tgl' => date('Y-m-d')])->one();
    		if ($new->h1 = $sts){
    			$new->h1 = $sts;
    			if ($new->save()){
    				echo json_encode(array('hasil' => "<div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i></h4>
              </div>"));
    			}
    		}
      // echo json_encode("ada");
    	 }
    }

    /**
     * Deletes an existing TblAbsen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblAbsen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAbsen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAbsen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
