<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\domains\models\Category */

$this->title = 'Редактировать категорию';
?>

<h1 class="my-md-5 my-4"><?= Html::encode($this->title); ?></h1>

<div class="row">
    <div class="col-lg-5 col-md-8">

        <?= $this->render('_form', [
            'model' => $model,
        ]); ?>

    </div>
</div>