<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\domains\forms\SearchForm */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

        <?= $form->field($model, 'query', [
            'options' => [
                'class' => 'input-group mb-3',
            ],
            'template' => '{input}<button type="submit" class="btn btn-primary">Искать</button>',
        ]); ?>

<?php ActiveForm::end();
