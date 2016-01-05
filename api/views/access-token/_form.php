<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\AccessToken */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-token-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tokenid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validity')->textInput() ?>

    <?= $form->field($model, 'createtime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
