<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder=""
               aria-label="Example text with button addon" aria-describedby="button-addon1" name="search-query" value="">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' =>'button-addon1']) ?>
    </div>


<div class="material-search">


<?php ActiveForm::end(); ?>


