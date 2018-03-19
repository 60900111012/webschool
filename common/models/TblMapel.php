<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_mapel".
 *
 * @property string $id_mapel
 * @property string $nama_mapel
 * @property string $id_guru
 * @property string $semester
 *
 * @property TblAbsen[] $tblAbsens
 * @property TblJadwal[] $tblJadwals
 * @property TblGuru $idGuru
 * @property TblNilai[] $tblNilais
 */
class TblMapel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_mapel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mapel', 'nama_mapel', 'semester'], 'required'],
            [['semester'], 'string'],
            [['id_mapel', 'nama_mapel'], 'string', 'max' => 50],
            [['id_guru'], 'string', 'max' => 25],
            [['id_guru'], 'exist', 'skipOnError' => true, 'targetClass' => TblGuru::className(), 'targetAttribute' => ['id_guru' => 'id_guru']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mapel' => 'Id Mapel',
            'nama_mapel' => 'Nama Mapel',
            'id_guru' => 'Id Guru',
            'semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAbsens()
    {
        return $this->hasMany(TblAbsen::className(), ['id_pelajaran' => 'id_mapel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblJadwals()
    {
        return $this->hasMany(TblJadwal::className(), ['id_pelajaran' => 'id_mapel']);
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
        return $this->hasMany(TblNilai::className(), ['id_pelajaran' => 'id_mapel']);
    }
}
