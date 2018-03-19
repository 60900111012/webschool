<?php

namespace frontend\controllers;

class AboutController extends \yii\web\Controller
{
     public function actionContact()
    {
      return $this->render('contact');
    }
     public function actionSosmed()
    {
      return $this->render('sosmed');
    }
     public function actionWeb()
    {
      return $this->render('tentangweb');
    }


}
