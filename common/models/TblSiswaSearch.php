<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblSiswa;

/**
 * TblSiswaSearch represents the model behind the search form about `common\models\TblSiswa`.
 */
class TblSiswaSearch extends TblSiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_kelas', 'nama_siswa', 'alamat', 'agama', 'nama_ibu', 'nama_ayah'], 'safe'],
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
        $query = TblSiswa::find();

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
        $query->andFilterWhere(['like', 'id_siswa', $this->id_siswa])
            ->andFilterWhere(['like', 'id_kelas', $this->id_kelas])
            ->andFilterWhere(['like', 'nama_siswa', $this->nama_siswa])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah]);

        return $dataProvider;
    }
}
