<?php

namespace frontend\controllers;
use common\models\TblKet;
use common\models\TblSp;

class HomeController extends \yii\web\Controller
{
    public function actionSejarah()
    {
      $model = TblKet::findOne(1);
        return $this->render('sejarah',['model'=>$model,'title'=>'Sejarah','field' => 'sejarah']);
    }
    public function actionVisiDanMisi()
    {
      $model = TblKet::findOne(1);
      return $this->render('sejarah',['model'=>$model,'title'=>'Visi Dan Misi','field' => 'visi_dan_misi']);
    }
    // public function actionSaranaDanPrasarana(){
    //   $model = TblSp::find()->All();
    //   return $this->render('view',['model'=> $model]);
    // }
     public function actionSarana()
    {
      return $this->render('sarana');
    }
    public function actionStruktur()
    {
      return $this->render('struktur');
    }
     public function actionStrukturosis()
    {
      return $this->render('strukturosis');
    }



}
