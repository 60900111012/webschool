<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_nilai".
 *
 * @property integer $id
 * @property string $id_siswa
 * @property string $id_pelajaran
 * @property string $id_kelas
 * @property double $nilai_1
 * @property double $nilai_2
 * @property double $nilai_3
 * @property double $nilai_4
 * @property double $nilai_5
 * @property double $nilai_mid
 * @property double $nilai_akhir
 *
 * @property TblSiswa $idSiswa
 * @property TblMapel $idPelajaran
 * @property TblKelas $idKelas
 */
class TblNilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_nilai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_pelajaran'], 'required'],
            [['nilai_1', 'nilai_2', 'nilai_3', 'nilai_4', 'nilai_5', 'nilai_mid', 'nilai_akhir'], 'number'],
            [['id_siswa', 'id_pelajaran', 'id_kelas'], 'string', 'max' => 25],
            [['id_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => TblSiswa::className(), 'targetAttribute' => ['id_siswa' => 'id_siswa']],
            [['id_pelajaran'], 'exist', 'skipOnError' => true, 'targetClass' => TblMapel::className(), 'targetAttribute' => ['id_pelajaran' => 'id_mapel']],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => TblKelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_siswa' => 'Id Siswa',
            'id_pelajaran' => 'Id Pelajaran',
            'id_kelas' => 'Id Kelas',
            'nilai_1' => 'Nilai 1',
            'nilai_2' => 'Nilai 2',
            'nilai_3' => 'Nilai 3',
            'nilai_4' => 'Nilai 4',
            'nilai_5' => 'Nilai 5',
            'nilai_mid' => 'Nilai Mid',
            'nilai_akhir' => 'Nilai Akhir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSiswa()
    {
        return $this->hasOne(TblSiswa::className(), ['id_siswa' => 'id_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelajaran()
    {
        return $this->hasOne(TblMapel::className(), ['id_mapel' => 'id_pelajaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKelas()
    {
        return $this->hasOne(TblKelas::className(), ['id_kelas' => 'id_kelas']);
    }
}
