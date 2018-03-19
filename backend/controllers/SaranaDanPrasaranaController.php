<?php

namespace backend\controllers;

use Yii;
use common\models\TblSp;
use common\models\SpForm;
use common\models\TblSpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SaranaDanPrasaranaController implements the CRUD actions for TblSp model.
 */
class SaranaDanPrasaranaController extends Controller
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
     * Lists all TblSp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSp model.
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
     * Creates a new TblSp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SpForm();

        if ($model->load(Yii::$app->request->post())){
          $model->foto = UploadedFile::getInstance($model,'foto');
          if ($model->save()){
            $this->redirect(['index']);
          }
          else {
            var_dump($model->errors);
          }
        // if (){
        //   echo "save";
        // }
        // else {
        //   var_dump( $model->errors);
        // }
          // return $this->redirect(['view', 'id' => $model->id]);

        }
        else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblSp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $model = new SpForm();
      $model->get_update($id);
        if ($model->load(Yii::$app->request->post())){
              $model->foto = UploadedFile::getInstance($model,'foto');

          if ($model->set_update($id)){
            return $this->redirect(['index']);
          }

       } else {
           return $this->render('update', [
               'model' => $model,
           ]);
           echo "fal";
       }
    }

    /**
     * Deletes an existing TblSp model.
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
     * Finds the TblSp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
