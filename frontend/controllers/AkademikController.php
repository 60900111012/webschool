<?php

namespace frontend\controllers;
use Yii;
use common\models\TblGuru;
use common\models\TblKelas;
use common\models\TblSiswa;
use common\models\TblJadwal;
use common\models\FormSearch;
class AkademikController extends \yii\web\Controller
{
    public function actionGuru()
    {
      $model = TblGuru::find()->all();
        return $this->render('guru',['model' => $model]);
    }
    public function actionJadwal()
    {
      $data = TblJadwal::find()->leftJoin('tbl_kelas','tbl_kelas.id_kelas = tbl_jadwal.id_kelas')->orderBy(['jam_masuk'=>'ASC'])->all();
      $f = new TblJadwal();
      return $this->render('all',['model'=>$data,'f' => $f]);
      // var_dump($data);
    }
    public function actionKelas()
    {
      $model = TblKelas::find()->all();
      return $this->render('kelas',['model'=>$model]);
    }

    public function actionSiswa()
    {
      $model = TblSiswa::find()->all();
      return $this->render('view_siswa',['model'=>$model]);
    }

    public function  actionCariGuru()
    {
      $model =  new FormSearch();
      $data = array();
      if ($model->load(Yii::$app->request->post())){
        $data = $model->cari(array('hari'=>$model->hari));
      }
      return $this->render('search',['model'=>$model,'data'=>$data]);
    }

}
