<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <h1><?php echo Html::encode($this->title); ?></h1>

    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?php echo $form->field($model, 'password')->passwordInput(['autofocus' => true]); ?>

                <div class="form-group">
                    <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
