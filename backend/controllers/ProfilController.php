<?php

namespace backend\controllers;
use yii;
use common\models\ProfilForm;
 use yii\web\UploadedFile;
class ProfilController extends \yii\web\Controller
{
    public function actionIndex()
    {

      $model = new ProfilForm();
      if ($model->load(Yii::$app->request->post())){
        $model->img = UploadedFile::getInstance($model,'img');
        if ($model->set_update()){
           $this->redirect(['index']);
        }
      }
      else {
          return $this->render('index',['model' => $model]);
      }
    }
}
