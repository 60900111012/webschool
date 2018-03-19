<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "tbl_user".
 *
 * @property string $id
 * @property string $password
 * @property string $status
 *
 * @property TblGuru $tblGuru
 * @property TblSiswa $tblSiswa
 */
class TblUser extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $foto_;
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'password', 'status'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['status','img'], 'string'],
            [['id'],'unique','message' => '{attribute} Telah Digunakan'],
            [['id', 'password'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblGuru()
    {
        return $this->hasOne(TblGuru::className(), ['id_guru' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSiswa()
    {
        return $this->hasOne(TblSiswa::className(), ['id_siswa' => 'id']);
    }

    public static function findIdentity($id)
    {
        //mencari user login berdasarkan IDnya dan hanya dicari 1.
        $user = TblUser::findOne($id);
        if(count($user)){
            return new static($user);
        }
        return null;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //mencari user login berdasarkan accessToken dan hanya dicari 1.
        $user = Login::find()->where(['accessToken'=>$token])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }
    public static function findByUsername($username)
    {
        //mencari user login berdasarkan username dan hanya dicari 1.
        $user = TblUser::find()->where(['id'=>$username])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }
    public function getId()
    {
      if ($this->status == 'Guru'){
         $this->foto_ = $this->tblGuru->foto;
      }
      elseif ($this->status == 'Siswa') {
        $this->foto_ = $this->tblSiswa->foto;
      }
      elseif ($this->status == 'admin') {
        $this->foto_ = $this->img;
      }
        return $this->id;
    }
    public function getStatus()
    {
      return $this->status;
    }
    public function getNama(){
      if ($this->status == 'Guru'){
        return $this->tblGuru->nama_guru;
      }
      elseif ($this->status == 'Siswa') {
        return $this->tblSiswa->nama_siswa;
      }
      elseif ($this->status == 'admin') {
        return 'Admin';
      }
    }
    public function getFoto(){
      return $this->foto_;
    }
    public function getAuthKey()
    {
        return $this->auth_key;
        // return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    public function getGuru(){
        if ($this->status == 'Guru'){
            return true;
        }
        else{
            return false;
        }
    }
    public function getSiswa(){
        if ($this->status == 'Siswa'){
            return true;
        }
        else{
            return false;
        }
    }
    public function getAdmin(){
         if ($this->status == 'admin'){
            return 'admin';
        }
        else{
            return false;
        }
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
