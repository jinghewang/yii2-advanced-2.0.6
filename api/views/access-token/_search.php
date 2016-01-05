<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\AccessTokenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-token-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tokenid') ?>

    <?= $form->field($model, 'clientid') ?>

    <?= $form->field($model, 'appkey') ?>

    <?= $form->field($model, 'orgid') ?>

    <?= $form->field($model, 'uid') ?>

    <?php // echo $form->field($model, 'validity') ?>

    <?php // echo $form->field($model, 'createtime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
