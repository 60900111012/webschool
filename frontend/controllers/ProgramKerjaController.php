<?php

namespace frontend\controllers;
use common\models\TblProker;
class ProgramKerjaController extends \yii\web\Controller
{
  public function actionSekolah(){
    $model = TblProker::find()->where(['jenis_proker'=> 'Sekolah'])->all();
    return $this->render('index',['model' => $model,'judul' => 'Sekolah']);
  }
  public function actionOsis()
  {
    $model = TblProker::find()->where(['jenis_proker'=> 'Osis'])->all();
    return $this->render('index',['model' => $model,'judul' => 'OSIS']);
  }
  public function actionPmr(){
    $model = TblProker::find()->where(['jenis_proker'=> 'PMR'])->all();
    return $this->render('index',['model' => $model,'judul' => 'PMR']);
  }

}
