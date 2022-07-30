<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $material common\models\Material */
/* @var $tag common\models\Tag */
/* @var $model common\models\BindTagToMaterialForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['bind-tag'],
    'options' => [
        'class' => 'form-floating mb-3',
        'id' => 'add-tag-form',
    ],
]); ?>

<h3>Теги</h3>

    <?php echo $form->field($model, 'id')->hiddenInput(['value' => $material->id])->label(false); ?>
    <?php echo $form->field($model, 'tagId', [
        'options' => [
            'class' => 'input-group mb-3',
        ],
        'template' => '{input}<button type="submit" class="btn btn-primary">Добавить</button>{error}',
        'inputOptions' => [
            'class' => 'form-select form-control',
        ],
    ])->dropdownList(
        $tag::find()->select(['title'])->indexBy('id')->column(),
    )->label(false); ?>

<?php ActiveForm::end();
