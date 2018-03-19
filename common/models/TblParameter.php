<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_parameter".
 *
 * @property integer $id
 * @property string $nama_parameter
 * @property integer $nilai_parameter
 */
class TblParameter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_parameter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_parameter', 'nilai_parameter'], 'required'],
            [['nilai_parameter'], 'integer'],
            [['nama_parameter'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_parameter' => 'Nama Parameter',
            'nilai_parameter' => 'Nilai Parameter',
        ];
    }
}
