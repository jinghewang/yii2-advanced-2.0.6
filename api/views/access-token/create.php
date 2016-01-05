<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\AccessToken */

$this->title = 'Create Access Token';
$this->params['breadcrumbs'][] = ['label' => 'Access Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-token-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
