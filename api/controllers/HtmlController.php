<?php

namespace api\controllers;

use api\models\Contract;
use common\helpers\ConfigHelper;
use mPDF;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * AccessAppController implements the CRUD actions for AccessApp model.
 */
class HtmlController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AccessApp models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->renderPartial('inside');
    }

}
