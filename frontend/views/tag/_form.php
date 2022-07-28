<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="form-floating mb-3">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
</div>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>



