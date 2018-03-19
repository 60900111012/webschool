<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_proker".
 *
 * @property integer $id
 * @property string $jenis_proker
 * @property string $nama_proker
 * @property string $desk
 * @property string $tgl_post
 * @property string $tgl_kegiatan
 */
class TblProker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_proker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_proker', 'nama_proker', 'desk', 'tgl_post', 'tgl_kegiatan'], 'required'],
            [['jenis_proker', 'desk'], 'string'],
            [['tgl_post', 'tgl_kegiatan'], 'safe'],
            [['nama_proker'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_proker' => 'Jenis Proker',
            'nama_proker' => 'Nama Proker',
            'desk' => 'Desk',
            'tgl_post' => 'Tgl Post',
            'tgl_kegiatan' => 'Tgl Kegiatan',
        ];
    }
}
