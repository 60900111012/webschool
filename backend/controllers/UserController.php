<?php

namespace backend\controllers;

use Yii;
use common\models\TblUser;
use common\models\TblUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\data\SqlDataProvider;
/**
 * UserController implements the CRUD actions for TblUser model.
 */
class UserController extends Controller
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
                    // 'service' => ['POST'],
                ],
            ],
            // 'access' => [
            //        'class' => AccessControl::className(),
            //        // We will override the default rule config with the new AccessRule class
            //        'ruleConfig' => [
            //            'class' => AccessRule::className(),
            //        ],
            //        'only' => ['index','create', 'update', 'delete'],
            //        'rules' => [
            //            [
            //                'actions' => ['index','create', 'update', 'delete'],
            //                'allow' => true,
            //                // Allow users, moderators and admins to create
            //                'roles' => [
            //                     'admin',
            //                ],
            //            ],
            //            [
            //                'actions' => ['index'],
            //                'allow' => true,
            //                // Allow moderators and admins to update
            //                'roles' => [
            //                    'Siswa',
            //                    'Guru'
            //                ],
            //            ],
            //        ],
            //    ],
        ];
    }

    /**
     * Lists all TblUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $r = TblUser::find()->limit(1)->all();
        $searchModel = new TblUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function generate($status)
    {
        $d = new SqlDataProvider([
            'sql' => "select * from tbl_user where status='$status'",
            // 'sort' => [
            //     'attributes' => [
            //         'id' => [
            //             'asc' => ['id' => SORT_ASC,'password' => SORT_ASC],
            //             'desc' => ['id' => SORT_DESC,'password' => SORT_DESC],
            //             'default' => SORT_ASC,
            //         ],
            //         'password' => [
            //             'asc' => ['id' => SORT_ASC,'password' => SORT_ASC],
            //             'desc' => ['id' => SORT_DESC,'password' => SORT_DESC],
            //             'default' => SORT_ASC,
            //         ]
            //     ]
            // ]
        ]);
         return $this->render('index', [
            'searchModel' => $d,
            'dataProvider' => $d,
        ]);
    }
    public function actionSiswa()
    {
        return $this->generate('siswa');
        // $siswa = (new \yii\db\Query())->select('*')->from('tbl_user')->where(['status' => 'Siswa'])->all();
    }
    public function actionGuru()
    {
        return $this->generate('guru');
    }

    /**
     * Displays a single TblUser model.
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
     * Creates a new TblUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new TblUser();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Updates an existing TblUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            // if ($model->id != Yii::$app->request->pos())
            // 
            // 
            $post = Yii::$app->request->post();
            if ($post['TblUser']['id'] != $model->id){
                if ( $model->save())

                    return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                   return $this->redirect(['/user']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblUser model.
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
     * Finds the TblUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     public function actionService()
    {
        $f = array();
        // if ($_SERVER['REQUEST_METHOD'] == 'POST')
        // {
        //     array_push($f,array('id' => 'alnar'));
          
        //     echo json_encode(array('hasil' => $f));
        // }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            array_push($f,array('id' => 'work'));
          
        }
        else{
            array_push($f,array('id' => 'nothing'));
          
        }
          echo json_encode(array('hasil' => $f));
    }
}
