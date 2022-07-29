<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'fieldConfig' => ['options' => ['class' => 'form-floating mb-3']],
]); ?>

<?= $form->field($model, 'title',[
    'template' => '{input}{error}<label for="floatingSelectType">Название</label>',
    'inputOptions' => [
        'id' => 'floatingSelectCategory',
        'class' => 'form-control',
        'placeholder' => 'placeholder',
    ]
]) ?>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
