<?php

namespace backend\controllers;

use Yii;
use common\models\TblJadwal;
use common\models\TblKelas;
use common\models\TblMapel;
use common\models\TblJadwalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;


/**
 * JadwalController implements the CRUD actions for TblJadwal model.
 */
class JadwalController extends Controller
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
            'access' => [
                   'class' => AccessControl::className(),
                   // We will override the default rule config with the new AccessRule class
                   'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   'only' => ['index','create', 'update', 'delete'],
                   'rules' => [
                       [
                           'actions' => ['index','create', 'update', 'delete'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                                'admin',
                           ],
                       ],
                       [
                           'actions' => ['index'],
                           'allow' => true,
                           // Allow moderators and admins to update
                           'roles' => [
                               'Siswa',
                               'Guru'
                           ],
                       ],
                   ],
               ], 
        ];
    }

    /**
     * Lists all TblJadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblJadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblJadwal model.
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
     * Creates a new TblJadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblJadwal();
        $kelas = new TblKelas();
        $mapel = new TblMapel();

        if ($model->load(Yii::$app->request->post())) {
            if (strtotime(str_replace(' ','',$model->jam_masuk)) >= strtotime(str_replace(' ','',$model->jam_keluar))){
                 \Yii::$app->getSession()->setFlash('error','Jam Tidak valid');
            }
            else
            {
                if ($model->cekJadwal() != 0){
                    \Yii::$app->getSession()->setFlash('error','Jadwal Tidak Valid');
                }
                else{
                    if ($model->save()){
                        return $this->redirect(['/jadwal']);
                    }
                }
            }
        } 
            return $this->render('create', [
                'model' => $model,'kelas' => $kelas,'mapel' => $mapel,
            ]);
    }

    /**
     * Updates an existing TblJadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSemuaJadwal(){
        $data = TblJadwal::find()->leftJoin('tbl_kelas','tbl_kelas.id_kelas = tbl_jadwal.id_kelas')->groupBy(['nama_kelas'])->orderBy(['jam_masuk'=>'ASC'])->all();
        $f = new TblJadwal();
        // foreach ($data as $k){
        //     $r = $f->find()->where(['id_kelas' => $k->id_kelas])->all();
        //     // foreach ($data as $d){
        //     //     echo "sd";
        //     // }
        // }
        return $this->render('all',['model'=>$data,'f' => $f]);

    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
          $mapel = new TblMapel();
          $kelas = new TblKelas();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,'mapel' => $mapel,'kelas' => $kelas,
            ]);
        }
    }

    /**
     * Deletes an existing TblJadwal model.
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
     * Finds the TblJadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblJadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblJadwal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
