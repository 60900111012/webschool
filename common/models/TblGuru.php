<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_guru".
 *
 * @property string $id_guru
 * @property string $nama_guru
 * @property string $alamat
 * @property string $email
 * @property string $status_guru
 * @property string $pendidikan
 * @property string $jk
 * @property string $agama
 * @property string $foto
 *
 * @property TblUser $idGuru
 * @property TblKelas $tblKelas
 * @property TblMapel[] $tblMapels
 */
class TblGuru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_guru', 'nama_guru', 'status_guru', 'pendidikan', 'jk', 'agama'], 'required'],
            [['alamat', 'status_guru', 'pendidikan', 'jk', 'agama', 'foto'], 'string'],
            [['id_guru', 'nama_guru', 'email'], 'string', 'max' => 50],
            [['id_guru'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['id_guru' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guru' => 'Id Guru',
            'nama_guru' => 'Nama Guru',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'status_guru' => 'Status Guru',
            'pendidikan' => 'Pendidikan',
            'jk' => 'Jk',
            'agama' => 'Agama',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGuru()
    {
        return $this->hasOne(TblUser::className(), ['id' => 'id_guru']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblKelas()
    {
        return $this->hasOne(TblKelas::className(), ['id_guru' => 'id_guru']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMapels()
    {
        return $this->hasMany(TblMapel::className(), ['id_guru' => 'id_guru']);
    }
}
