<?php

/** @var yii\web\View$this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email">
    <h1><?php echo Html::encode($this->title); ?></h1>

    <p>Please fill out your email. A verification email will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?php echo $form->field($model, 'email')->textInput(['autofocus' => true]); ?>

            <div class="form-group">
                <?php echo Html::submitButton('Send', ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
