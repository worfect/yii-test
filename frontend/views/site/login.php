<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?php echo Html::encode($this->title); ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?php echo $form->field($model, 'username')->textInput(['autofocus' => true]); ?>

                <?php echo $form->field($model, 'password')->passwordInput(); ?>

                <?php echo $form->field($model, 'rememberMe')->checkbox(); ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?php echo Html::a('reset it', ['site/request-password-reset']); ?>.
                    <br>
                    Need new verification email? <?php echo Html::a('Resend', ['site/resend-verification-email']); ?>
                </div>

                <div class="form-group">
                    <?php echo Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
