<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\AccessApp */

$this->title = 'Create Access App';
$this->params['breadcrumbs'][] = ['label' => 'Access Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
