<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ket".
 *
 * @property integer $id
 * @property string $sejarah
 * @property string $visi_dan_misi
 */
class TblKet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sejarah', 'visi_dan_misi'], 'required'],
            [['sejarah', 'visi_dan_misi'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sejarah' => 'Sejarah',
            'visi_dan_misi' => 'Visi Dan Misi',
        ];
    }
}
