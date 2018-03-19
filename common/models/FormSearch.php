<?php


namespace common\models;

use Yii;
use yii\base\Model;

    class formSearch extends Model    {
        
        public $nama;
        public $hari;
        
        // public function attributeLabels(){
        //     return [
        //       'nama' => 'Nama',
        //       'hari' => 'hari',
        //     ];
        //   }

          public function rules()
          {
              return [
                  [['nama','hari'],'string'],
              ];
          }

          public function cari()
          {
            return $model = TblGuru::find()->joinWith(['tblMapels' => function($q){
                $q->joinWith(['tblJadwals'=>function($r){
                    $r->where(['hari'=>$this->hari]);
                }]);
            }])->where(['nama_guru'=>$this->nama])->all();
          }
    }
    
?>