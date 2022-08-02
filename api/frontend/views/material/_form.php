<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $material frontend\domains\models\Material */
/* @var $type frontend\domains\models\Type */
/* @var $category frontend\domains\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'fieldConfig' => ['options' => ['class' => 'form-floating mb-3']],
]); ?>

    <?= $form->field($material, 'type_id', [
        'template' => '{input}{error}<label for="floatingSelectType">Тип</label>',
        'inputOptions' => [
            'id' => 'floatingSelectType',
            'class' => 'form-select',
            'placeholder' => 'placeholder',
        ],
    ])->dropdownList(
        $type::find()->select(['title', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Выберите тип']
    )->label(false); ?>

    <?= $form->field($material, 'category_id', [
        'template' => '{input}{error}<label for="floatingSelectType">Категория</label>',
        'inputOptions' => [
            'id' => 'floatingSelectCategory',
            'class' => 'form-select',
            'placeholder' => 'placeholder',
        ],
    ])->dropdownList(
        $category::find()->select(['title', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Выберите категорию']
    )->label(false); ?>

    <?= $form->field($material, 'title', [
        'template' => '{input}{error}<label for="floatingSelectType">Название</label>',
        'inputOptions' => [
            'id' => 'floatingTitle',
            'class' => 'form-control',
            'placeholder' => 'placeholder',
        ],
    ])->textInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($material, 'author', [
        'template' => '{input}{error}<label for="floatingSelectType">Автор</label>',
        'inputOptions' => [
            'id' => 'floatingAuthor',
            'class' => 'form-control',
            'placeholder' => 'placeholder',
        ],
    ])->textInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($material, 'description', [
        'template' => '{input}{error}<label for="floatingSelectType">Описание</label>',
        'inputOptions' => [
            'id' => 'floatingDescription',
            'class' => 'form-control',
            'placeholder' => 'placeholder',
        ],
    ])->textInput(['maxlength' => true])->textarea(['rows' => '6'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
    </div>

<?php ActiveForm::end();