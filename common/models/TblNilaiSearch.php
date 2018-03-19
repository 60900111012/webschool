<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblNilai;

/**
 * TblNilaiSearch represents the model behind the search form about `common\models\TblNilai`.
 */
class TblNilaiSearch extends TblNilai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_siswa', 'id_pelajaran', 'id_kelas'], 'safe'],
            [['nilai_1', 'nilai_2', 'nilai_3', 'nilai_4', 'nilai_5', 'nilai_mid', 'nilai_akhir'], 'number'],
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
        $query = TblNilai::find();

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
            'nilai_1' => $this->nilai_1,
            'nilai_2' => $this->nilai_2,
            'nilai_3' => $this->nilai_3,
            'nilai_4' => $this->nilai_4,
            'nilai_5' => $this->nilai_5,
            'nilai_mid' => $this->nilai_mid,
            'nilai_akhir' => $this->nilai_akhir,
        ]);

        $query->andFilterWhere(['like', 'id_siswa', $this->id_siswa])
            ->andFilterWhere(['like', 'id_pelajaran', $this->id_pelajaran])
            ->andFilterWhere(['like', 'id_kelas', $this->id_kelas]);

        return $dataProvider;
    }
}
