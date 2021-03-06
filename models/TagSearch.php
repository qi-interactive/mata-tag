<?php
 
/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace mata\tag\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use mata\tag\models\Tag;

/**
 * CategorySearch represents the model behind the search form about `\mata\category\models\Tag`.
 */
class TagSearch extends Tag {
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['Id'], 'integer'],
        [['Name', 'URI'], 'safe'],
        ];
    }

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
        $query = Tag::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Id' => $this->Id,
            ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
        ->andFilterWhere(['like', 'URI', $this->URI]);

        return $dataProvider;
    }
}
