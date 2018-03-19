<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblJadwal;

/**
 * TblJadwalSearch represents the model behind the search form about `common\models\TblJadwal`.
 */
class TblJadwalSearch extends TblJadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_pelajaran', 'hari', 'jam_masuk', 'jam_keluar', 'id_kelas'], 'safe'],
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
        $query = TblJadwal::find();

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
            'jam_masuk' => $this->jam_masuk,
            'jam_keluar' => $this->jam_keluar,
        ]);

        $query->andFilterWhere(['like', 'id_pelajaran', $this->id_pelajaran])
            ->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'id_kelas', $this->id_kelas]);

        return $dataProvider;
    }
}
