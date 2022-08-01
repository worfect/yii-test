<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $material common\models\Material */
/* @var $model common\models\LinkForm */
?>

<div class="modal fade" id="linkModalToggle" aria-hidden="true" aria-labelledby=""
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Добавить/редактировать ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'form-floating mb-3',
                    'id' => 'link-form',
                ],
            ]); ?>

            <div class="modal-body">

            <?= $form->field($model, 'linkId',[
                'inputOptions' => [
                    'class' => 'linkId',
                ],
            ])->hiddenInput()->label(false); ?>

            <?= $form->field($model, 'id')->hiddenInput(['value' => $material->id])->label(false); ?>

            <?= $form->field($model, 'title', [
                'template' => '<div class="form-floating mb-3">
                                    {input}{error}<label for="floatingModalSignature">Подпись</label>
                               </div>',
                'inputOptions' => [
                    'class' => 'form-control linkTitle',
                    'id' => 'floatingModalSignature',
                    'placeholder' => 'Добавьте подпись',
                ],
            ])->label(false); ?>

            <?= $form->field($model, 'url', [
                'template' => ' <div class="form-floating mb-3">
                                    {input}{error}<label for="floatingModalLink">Ссылка</label>
                                </div>',
                'inputOptions' => [
                    'class' => 'form-control linkUrl',
                    'id' => 'floatingModalLink',
                    'placeholder' => 'Добавьте ссылку',
                ],
            ])->label(false); ?>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
</div>