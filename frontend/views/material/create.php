<?php

/* @var $this yii\web\View */
/* @var $material common\models\Material */
/* @var $type common\models\Type */
/* @var $category common\models\Category */

$this->title = 'Добавить материал';
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