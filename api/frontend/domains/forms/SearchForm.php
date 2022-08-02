<?php

declare(strict_types=1);

namespace frontend\domains\forms;

use frontend\domains\models\Material;
use frontend\helpers\CustomActiveRecord;
use yii\data\ActiveDataProvider;

final class SearchForm extends CustomActiveRecord
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
