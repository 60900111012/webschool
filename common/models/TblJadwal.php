<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_jadwal".
 *
 * @property integer $id
 * @property string $id_pelajaran
 * @property string $hari
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property string $id_kelas
 *
 * @property TblKelas $idKelas
 * @property TblMapel $idPelajaran
 */
class TblJadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajaran', 'hari', 'jam_masuk', 'jam_keluar', 'id_kelas'], 'required'],
            [['jam_masuk', 'jam_keluar'], 'safe'],
            [['id_pelajaran', 'id_kelas'], 'string', 'max' => 25],
            [['hari'], 'string', 'max' => 50],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => TblKelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
            [['id_pelajaran'], 'exist', 'skipOnError' => true, 'targetClass' => TblMapel::className(), 'targetAttribute' => ['id_pelajaran' => 'id_mapel']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pelajaran' => 'Id Pelajaran',
            'hari' => 'Hari',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'id_kelas' => 'Id Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function buatJadwal(){
        $a = new Query();
        return $a->select('*')->from('tbl_jadwal')->leftJoin('tbl_kelas','tbl_kelas.id_kelas = tbl_jadwal.id_kelas')->groupBy('tbl_kelas.nama_kelas');
    }
    public function cekJadwal(){
        return $this->find()->where(['id_pelajaran' => $this->id_pelajaran,'hari'=> $this->hari,'jam_masuk' => $this->jam_masuk,'jam_keluar' => $this->jam_keluar,'id_kelas' => $this->id_kelas])->count();
    }
    public function getIdKelas()
    {
        return $this->hasOne(TblKelas::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelajaran()
    {
        return $this->hasOne(TblMapel::className(), ['id_mapel' => 'id_pelajaran']);
    }
}
