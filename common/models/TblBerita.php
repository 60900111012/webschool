<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_berita".
 *
 * @property integer $id
 * @property string $judul
 * @property string $isi
 * @property string $tgl
 * @property string $img
 * @property string $id_post
 */
class TblBerita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'isi', 'tgl'], 'required'],
            [['isi'], 'string'],
            [['tgl'], 'safe'],
            [['judul'], 'string', 'max' => 25],
            [['img'], 'string', 'max' => 90],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'tgl' => 'Tgl',
            'img' => 'Img',
            'id_post' => 'Id Post',
        ];
    }
}
