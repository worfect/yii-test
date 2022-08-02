<?php

/* @var $this yii\web\View */
/* @var $material frontend\domains\models\Material */
/* @var $type frontend\domains\models\Type */
/* @var $category frontend\domains\models\Category */

$this->title = 'Редактировать материал';
?>

<h1 class="my-md-5 my-4"><?= $this->title; ?></h1>

<div class="row">
    <div class="col-lg-5 col-md-8">
        <?= $this->render('_form', [
            'category' => $category,
            'material' => $material,
            'type' => $type,
        ]); ?>
    </div>
</div>