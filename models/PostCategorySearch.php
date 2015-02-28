<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostCategory;

/**
 * PostCategorySearch represents the model behind the search form about `app\models\PostCategory`.
 */
class PostCategorySearch extends PostCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'views', 'position'], 'integer'],
            [['title', 'url', 'content', 'image', 'metaKeywords', 'metaDescription', 'metaTitle'], 'safe'],
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
        $query = PostCategory::find();

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
            'id' => $this->id,
            'views' => $this->views,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'metaKeywords', $this->metaKeywords])
            ->andFilterWhere(['like', 'metaDescription', $this->metaDescription])
            ->andFilterWhere(['like', 'metaTitle', $this->metaTitle]);

        return $dataProvider;
    }
}
