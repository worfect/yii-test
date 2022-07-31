<?php

declare(strict_types=1);

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

final class SearchForm extends Model
{
    public string $query = '';

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['query', 'string'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Material::find();

        $this->load($params);

        $query->joinWith('category')
            ->joinWith('tag')
            ->andWhere(['ILIKE', 'materials.author', $this->query])
            ->orWhere(['ILIKE', 'materials.title', $this->query])
            ->orWhere(['ILIKE', 'categories.title', $this->query])
            ->orWhere(['ILIKE', 'tags.title', $this->query]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
