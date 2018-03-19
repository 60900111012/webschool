<?php

namespace backend\controllers;

use Yii;
use common\models\TblNilai;
use common\models\TblParameter;
use common\models\NilaiForm;
use common\models\TblJadwal;
use common\models\TblSiswa;
use common\models\TblMapel;
use common\models\TblNilaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use \yii\db\Query;

/**
 * NilaiController implements the CRUD actions for TblNilai model.
 */
class NilaiController extends Controller
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

    /**
     * Lists all TblNilai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblNilaiSearch();
        $model = new NilaiForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblNilai model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblNilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $q = '';

        // $q = (new \yii\db\Query())->select(['tbl_mapel.*','tbl_kelas.*'])->from('tbl_mapel')->join('left join','tbl_jadwal','tbl_mapel.id_mapel = tbl_jadwal.id_pelajaran')->join('left join','tbl_kelas','tbl_kelas.id_kelas = tbl_jadwal.id_kelas')->where(['tbl_mapel.id_guru' => Yii::$app->user->identity->id]);
        $mapel = TblMapel::find()->join('left join','tbl_jadwal','tbl_jadwal.id_pelajaran = tbl_mapel.id_mapel')->where(['tbl_mapel.id_guru'=> Yii::$app->user->identity->id])->all();
        $model = new NilaiForm();
        if ($model->load(Yii::$app->request->post())){
            $index_nilai = 'nilai_'.$model->jenis_nilai;
            $cek = TblNilai::find()->where(['id_pelajaran' => $model->id_pelajaran,'id_siswa'=>$model->id_siswa,'id_kelas' => $model->id_kelas])->count();
            if ($cek == 0){
                if ($model->simpan()){
                    return $this->redirect(['index']);
                }
            }
            else{
               if ( $model->tambah_nilai()){
                return $this->redirect(['index']);
               }
            }
        } else {
            return $this->render('create', [
                'model' => $model,'mapel' => $mapel,
            ]);
        }
    }

    public function actionData($id_kelas){

        $kelas = TblSiswa::find()->where(['id_kelas' => $id_kelas])->all();
        $data = array();
        foreach ($kelas as $k){
            $h = array();
            $h['id'][] = $k->id_siswa;
            $h['nama'][] = $k->nama_siswa;
            $data[] = $h;
        }
        echo json_encode(array('kelas' => $data));
    }
    public function actionKelas($id_mapel)
    {
        $kelas = TblJadwal::find()->where(['id_pelajaran' => $id_mapel])->groupBy('id_pelajaran')->all();
        $data = array();
        foreach ($kelas as $k) {
            $da = array();
            $da['id_kelas'] = $k->id_kelas;
            $da['nama_kelas'] = $k->idKelas->nama_kelas;
            $data[] = $da;
        }
        echo json_encode(array('hasil' => $data));
    }

    /**
     * Updates an existing TblNilai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new NilaiForm();
        
        $model->before($this->findModel($id));
        
        $mapel = TblMapel::find()->join('left join','tbl_jadwal','tbl_jadwal.id_pelajaran = tbl_mapel.id_mapel')->where(['tbl_mapel.id_guru'=> Yii::$app->user->identity->id])->all();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->tambah_nilai()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            // $model = new NilaiForm();
            // $model->before($this->findModel($id));
            return $this->render('update', ['model' => $model,'mapel' => $mapel]);
        }
    }
    // public function actionCoba($id)
    // {
       
    //     var_dump();
    // }
    /**
     * Deletes an existing TblNilai model.
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
     * Finds the TblNilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblNilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblNilai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
