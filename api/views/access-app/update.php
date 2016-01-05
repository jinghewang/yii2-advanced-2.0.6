<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\AccessApp */

$this->title = 'Update Access App: ' . ' ' . $model->appkey;
$this->params['breadcrumbs'][] = ['label' => 'Access Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->appkey, 'url' => ['view', 'id' => $model->appkey]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="access-app-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
