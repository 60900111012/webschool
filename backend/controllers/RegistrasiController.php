<?php

namespace backend\controllers;
use Yii;
use common\models\TblSiswa;
use common\models\TblUser;
use common\models\TblGuru;
use common\models\TblKelas;
use \yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;
class RegistrasiController extends Controller
{
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
                   'only' => ['index','siswa', 'guru'],
                   'rules' => [
                       [
                           'actions' => ['index','siswa', 'guru'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                                'admin',
                           ],
                       ],
                   ],
               ], 
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSiswa(){
    	$model = new TblSiswa();
    	$user = new TblUser();
    	$kelas = new TblKelas();
	    if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post()))
	    {
	    	$user->password = $user->id;
	    	$user->status = "Siswa";
	    	if ($user->validate()){
	    		if ($user->save()){
	    			$model->id_siswa = $user->id;
	    			if ($model->validate()){
	            		if ($model->save()){
	            			return $this->redirect(['/siswa']);
	            		}	
	        		}
	    		}
	    	}
	    }
	    return $this->render('siswa',['model' => $model,'kelas' => $kelas,'user' => $user]);
	}
    public function actionGuru(){
    	$model = new TblGuru();
    	$user = new TblUser();
	    if ($model->load(Yii::$app->request->post()))
      {
	    	$user->id = $model->id_guru;
	    	$user->password = $model->id_guru;
	    	$user->status = "Guru";

	    	if ($user->validate()){
	    		if ($user->save()){
	    			if ($model->validate()) {
	            		if ($model->save()){
	            			return $this->redirect(['/guru']);
	            		}
	        		}
              else{
                var_dump($model->getErrors());
              }
	    		}
	    	}
	    }

	    return $this->render('guru', [
	        'model' => $model,
	    ]);
    }

}
