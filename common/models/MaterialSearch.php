<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MaterialSearch represents the model behind the search form of `common\models\Material`.
 */
final class MaterialSearch extends Material
{
    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $this->load($params);

        if ($this->title) {
            $query = Material::find()
                ->joinWith('category')
                ->joinWith('tag')
                ->where(['ILIKE', 'materials.author', $this->title])
                ->orWhere(['ILIKE', 'materials.title', $this->title])
                ->orWhere(['ILIKE', 'categories.title', $this->title])
                ->orWhere(['ILIKE', 'tags.title', $this->title]);
        } else {
            $query = Material::find();
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
