<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
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
class TblLogin extends \yii\db\ActiveRecord 
{
    /**
     * @inheritdoc
     */
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
            [['id', 'password', 'status'], 'required'],
            [['status'], 'string'],
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
    public function validatePassword($password)
    {
       if ($password !== $this->password)
        return false;
        else
            return true;
         // return Yii::$app->security->validatePassword($password, $this->password);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['id' => $username]);
    }
}
