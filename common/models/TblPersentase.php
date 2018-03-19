<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_persentase".
 *
 * @property integer $id
 * @property integer $tugas
 * @property integer $mid
 * @property integer $final
 */
class TblPersentase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_persentase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tugas', 'mid', 'final'], 'required'],
            [['tugas', 'mid', 'final'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tugas' => 'Tugas',
            'mid' => 'Mid',
            'final' => 'Final',
        ];
    }
}
