<?php

namespace backend\controllers;

use Yii;
use common\models\TblGuru;
use common\models\TblUser;
use common\models\TblGuruSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;
/**
 * GuruController implements the CRUD actions for TblGuru model.
 */
class GuruController extends Controller
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
     * Lists all TblGuru models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblGuruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblGuru model.
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
     * Creates a new TblGuru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // $model = new TblGuru();

        // if ($model->load(Yii::$app->request->post())){
        //   if ( $model->save()){
        //      return $this->redirect(['view', 'id' => $model->id_guru]);
        //   }
        //   else{
        //     echo "string";
        //   }
        // } else {
        //     // return $this->render('create', [
        //     //     'model' => $model,
        //     // ]);
        // }
    }

    /**
     * Updates an existing TblGuru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_guru]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblGuru model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

        
        if (($model = TblUser::findOne($id)) !== null) {
            $model->delete();
            return $this->redirect(['index']);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the TblGuru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblGuru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblGuru::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
