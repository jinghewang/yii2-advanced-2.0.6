<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel api\models\OrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organizations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Organization', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'orgid',
            'name',
            'parentid',
            'lft',
            'rgt',
            // 'level',
            // 'enname',
            // 'vercode',
            // 'seal',
            // 'logo',
            // 'teltext',
            // 'createuserid',
            // 'createtime',
            // 'extra_data:ntext',
            // 'isdelete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
