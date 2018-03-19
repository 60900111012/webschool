<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblKelas;

/**
 * TblKelasSearch represents the model behind the search form about `common\models\TblKelas`.
 */
class TblKelasSearch extends TblKelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelas', 'nama_kelas', 'id_guru'], 'safe'],
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
        $query = TblKelas::find();

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
        $query->andFilterWhere(['like', 'id_kelas', $this->id_kelas])
            ->andFilterWhere(['like', 'nama_kelas', $this->nama_kelas])
            ->andFilterWhere(['like', 'id_guru', $this->id_guru]);

        return $dataProvider;
    }
}
