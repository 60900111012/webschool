<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_sp".
 *
 * @property integer $id
 * @property string $nama
 * @property string $foto
 */
class TblSp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foto'], 'string'],
            [['nama'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'foto' => 'Foto',
        ];
    }
}
