<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $material common\models\Material */
/* @var $link common\models\Link */
/* @var $tag common\models\Tag */

$this->title = $material->title;
?>
<div class="material-view">

    <h1 class="my-md-5 my-4"><?= Html::encode($this->title) ?></h1>

    <div class="row mb-3">
        <div class="col-lg-6 col-md-8">
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Авторы</p>

            </div>
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Тип</p>
                <p class="col"></p>
            </div>
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Категория</p>
                <p class="col"></p>
            </div>
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Описание</p>
                <p class="col"></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            form
            list
        </div>
        <div class="col-md-6">
            list
        </div>
    </div>

</div>
