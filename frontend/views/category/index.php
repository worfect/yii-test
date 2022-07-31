<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>

<h1 class="my-md-5 my-4"><?= Html::encode($this->title); ?></h1>

<?= Html::a('Добавить', ['create'], ['class' => 'btn btn-primary mb-4']); ?>

<div class="row">
    <div class="col-md-6">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '<li class="list-group-item d-flex justify-content-between">
                        <strong>Название</strong></li>{items}',
            'options' => [
                'tag' => 'ul',
                'class' => 'list-group mb-4',
            ],
            'itemOptions' => [
                    'class' => 'list-group-item list-group-item-action d-flex justify-content-between'
            ],
            'itemView' => '_item',
        ]); ?>
    </div>
</div>
