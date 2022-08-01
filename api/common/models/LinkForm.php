<?php

declare(strict_types=1);

namespace common\models;

class LinkForm extends Material
{
    public string $title = '';
    public string $url = '';
    public string $linkId = '';

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['linkId'], 'safe'],
            [['id', 'url'], 'required', 'message' => 'Пожалуйста, заполните поле'],
            [['url'], 'url', 'message' => 'Тут должна быть ссылка'],
        ];
    }

    public function action(): void
    {
        if ($this->validate()) {
            if ($this->linkId) {
                $this->upd();
            } else {
                $this->add();
            }
        }
    }

    protected function add(): void
    {
        $material = Material::findOne($this->id);

        $counter = 0;
        if ($material->links_json) {
            $links = json_decode($material->links_json, true);
            foreach ($links as $link) {
                if ($link['id'] > $counter) {
                    $counter = $link['id'];
                }
            }
        }

        $links[] = [
            'url' => $this->url,
            'title' => $this->title,
            'id' => ++$counter,
        ];

        $material->links_json = json_encode($links);
        $material->save();
    }

    protected function upd(): void
    {
        $material = Material::findOne($this->id);

        $links = json_decode($material->links_json, true);
        foreach ($links as &$link) {
            if ($link['id'] === (int)$this->linkId) {
                $link['url'] = $this->url;
                $link['title'] = $this->title;
            }
        }

        $material->links_json = json_encode($links);
        $material->save();
    }
}
