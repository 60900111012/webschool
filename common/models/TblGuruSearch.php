<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblGuru;

/**
 * TblGuruSearch represents the model behind the search form about `common\models\TblGuru`.
 */
class TblGuruSearch extends TblGuru
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_guru', 'nama_guru', 'status_guru', 'pendidikan'], 'safe'],
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
        $query = TblGuru::find();

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
        $query->andFilterWhere(['like', 'id_guru', $this->id_guru])
            ->andFilterWhere(['like', 'nama_guru', $this->nama_guru])
            ->andFilterWhere(['like', 'status_guru', $this->status_guru])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan]);

        return $dataProvider;
    }
}
