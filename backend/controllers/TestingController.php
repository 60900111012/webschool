<?php

namespace backend\controllers;
// use yii\rest\Controller;
use Yii;
use common\models\TblGuru;
use yii\filters\VerbFilter;
use yii\web\Response;
class TestingController extends \yii\rest\Controller
{
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'akbar' => ['POST'],
                ],
            ],
            [
            	'class' => 'yii\filters\ContentNegotiator',
            	'only'=> ['insert'],
            	'formats' => [
            		'application/json' => Response::FORMAT_JSON],
            ]
        ];
    }
    
	public function actionAkbar()
	{
		if (Yii::$app->request->post()){
            $data = array();
            array_push($data,array('id'=>'akar'));
            echo json_encode(array('hasil'=>$data));
        }
	}

}
