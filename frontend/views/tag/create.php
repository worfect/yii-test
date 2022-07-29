<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tag */

$this->title = 'Добавить тег';
?>

<h1 class="my-md-5 my-4"><?php echo Html::encode($this->title); ?></h1>

<div class="row">
    <div class="col-lg-5 col-md-8">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]); ?>
    </div>
</div>