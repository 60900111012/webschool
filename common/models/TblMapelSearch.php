<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblMapel;

/**
 * TblMapelSearch represents the model behind the search form about `common\models\TblMapel`.
 */
class TblMapelSearch extends TblMapel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mapel', 'nama_mapel', 'id_guru','semester'], 'safe'],
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
        $query = TblMapel::find();

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
        $query->andFilterWhere(['like', 'id_mapel', $this->id_mapel])
            ->andFilterWhere(['like', 'nama_mapel', $this->nama_mapel])
            ->andFilterWhere(['like', 'id_guru', $this->id_guru])
            ->andFilterWhere(['like', 'semester', $this->semester]);

        return $dataProvider;
    }
}
