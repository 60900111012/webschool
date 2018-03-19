<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_absen".
 *
 * @property integer $id
 * @property string $id_siswa
 * @property string $id_pelajaran
 * @property string $jam
 * @property string $tgl
 * @property string $h1
 *
 * @property TblMapel $idPelajaran
 * @property TblSiswa $idSiswa
 */
class TblAbsen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_absen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_pelajaran', 'jam', 'tgl', 'h1'], 'required'],
            [['jam', 'tgl'], 'safe'],
            [['id_siswa', 'id_pelajaran'], 'string', 'max' => 25],
            [['h1'], 'string', 'max' => 1],
            [['id_pelajaran'], 'exist', 'skipOnError' => true, 'targetClass' => TblMapel::className(), 'targetAttribute' => ['id_pelajaran' => 'id_mapel']],
            [['id_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => TblSiswa::className(), 'targetAttribute' => ['id_siswa' => 'id_siswa']],
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
            'jam' => 'Jam',
            'tgl' => 'Tgl',
            'h1' => 'H1',
        ];
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
    public function getIdSiswa()
    {
        return $this->hasOne(TblSiswa::className(), ['id_siswa' => 'id_siswa']);
    }
}
