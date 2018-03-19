<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_siswa".
 *
 * @property string $id_siswa
 * @property string $id_kelas
 * @property string $nama_siswa
 * @property string $alamat
 * @property string $agama
 * @property string $nama_ibu
 * @property string $nama_ayah
 * @property string $foto
 *
 * @property TblAbsen[] $tblAbsens
 * @property TblAlumni $tblAlumni
 * @property TblNilai[] $tblNilais
 * @property TblUser $idSiswa
 * @property TblKelas $idKelas
 */
class TblSiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_kelas', 'nama_siswa'], 'required'],
            [['alamat', 'agama', 'foto'], 'string'],
            [['id_siswa', 'nama_siswa', 'nama_ibu', 'nama_ayah'], 'string', 'max' => 50],
            [['id_kelas'], 'string', 'max' => 15],
            [['id_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['id_siswa' => 'id']],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => TblKelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'id_kelas' => 'Id Kelas',
            'nama_siswa' => 'Nama Siswa',
            'alamat' => 'Alamat',
            'agama' => 'Agama',
            'nama_ibu' => 'Nama Ibu',
            'nama_ayah' => 'Nama Ayah',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAbsens()
    {
        return $this->hasMany(TblAbsen::className(), ['id_siswa' => 'id_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAlumni()
    {
        return $this->hasOne(TblAlumni::className(), ['id_siswa' => 'id_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNilais()
    {
        return $this->hasMany(TblNilai::className(), ['id_siswa' => 'id_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSiswa()
    {
        return $this->hasOne(TblUser::className(), ['id' => 'id_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKelas()
    {
        return $this->hasOne(TblKelas::className(), ['id_kelas' => 'id_kelas']);
    }
    public function jml($id_kelas)
    {
        $model = TblSiswa::find()->where(['id_kelas'=>$id_kelas])->count();
        return $model;
    }
}
