<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblAbsen;

/**
 * TblAbsenSearch represents the model behind the search form about `common\models\TblAbsen`.
 */
class TblAbsenSearch extends TblAbsen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_pelajaran', 'id_siswa', 'jam', 'tgl', 'h1'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblAbsen::find()->leftJoin('tbl_mapel','tbl_mapel.id_mapel = tbl_absen.id_pelajaran')->where(['tbl_mapel.id_guru'=>Yii::$app->user->identity->id])->groupby('tbl_absen.id_siswa');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jam' => $this->jam,
            'tgl' => $this->tgl,
        ]);

        $query->andFilterWhere(['like', 'id_pelajaran', $this->id_pelajaran])
            ->andFilterWhere(['like', 'id_siswa', $this->id_siswa])
            ->andFilterWhere(['like', 'h1', $this->h1]);

        return $dataProvider;
    }
}
