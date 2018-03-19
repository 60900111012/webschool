<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_kelas".
 *
 * @property string $id_kelas
 * @property string $nama_kelas
 * @property string $id_guru
 *
 * @property TblJadwal[] $tblJadwals
 * @property TblGuru $idGuru
 * @property TblNilai[] $tblNilais
 * @property TblSiswa[] $tblSiswas
 */
class TblKelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelas', 'nama_kelas'], 'required'],
            [['id_kelas', 'id_guru'], 'string', 'max' => 50],
            [['nama_kelas'], 'string', 'max' => 15],
            [['id_guru'], 'unique'],
            [['id_guru'], 'exist', 'skipOnError' => true, 'targetClass' => TblGuru::className(), 'targetAttribute' => ['id_guru' => 'id_guru']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'nama_kelas' => 'Nama Kelas',
            'id_guru' => 'Id Guru',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblJadwals()
    {
        return $this->hasMany(TblJadwal::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGuru()
    {
        return $this->hasOne(TblGuru::className(), ['id_guru' => 'id_guru']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNilais()
    {
        return $this->hasMany(TblNilai::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSiswas()
    {
        return $this->hasMany(TblSiswa::className(), ['id_kelas' => 'id_kelas']);
    }
}
