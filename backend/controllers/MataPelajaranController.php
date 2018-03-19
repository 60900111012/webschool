<?php

namespace backend\controllers;

use Yii;
use common\models\TblMapel;
use common\models\TblGuru;
use common\models\TblMapelSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;

/**
 * MataPelajaranController implements the CRUD actions for TblMapel model.
 */
class MataPelajaranController extends Controller
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
     * Lists all TblMapel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblMapelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblMapel model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblMapel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblMapel();
        $guru = new TblGuru();
        if ($model->load(Yii::$app->request->post())) {
            $model->id_mapel = $model->id_mapel.'-'.$model->semester;
            if ($model->save()){
                return $this->redirect(['/mata-pelajaran']);
            }
        }
        return $this->render('create', [
                'model' => $model,'guru' => $guru
            ]);
    }

    /**
     * Updates an existing TblMapel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $guru = new TblGuru();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mapel]);
        } else {
            return $this->render('update', [
                'model' => $model,'guru' => $guru,
            ]);
        }
    }

    /**
     * Deletes an existing TblMapel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblMapel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblMapel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblMapel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
