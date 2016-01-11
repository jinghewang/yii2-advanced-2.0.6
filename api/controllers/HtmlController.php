<?php

namespace api\controllers;

use common\helpers\ConfigHelper;
use mPDF;
use Yii;
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

    /**
     * Lists all AccessApp models.
     * @return mixed
     */
    public function actionIndexPdf()
    {
        /**
         * @var Pdf $pdf
         */
        $css = Yii::$app->basePath . "/web/css/ec.css";
        $css = file_get_contents($css);
        $htmlContent = $this->renderPartial('inside');//file_get_contents("D:/template/t2.htm");
        $pdf = Yii::$app->pdf;
        $pdf->cssInline .= $css;
        $pdf->content = $htmlContent;
        $pdf->methods['SetHeader'] = '合同编号<span class="color-tno">N1500001</span>';
        $pdf->methods['SetTitle'] = ConfigHelper::getAppConfig('down');
        $pdf->methods['SetAuthor'] = ConfigHelper::getAppConfig('author');
        $pdf->methods['SetCreator'] = ConfigHelper::getAppConfig('creator');
        $pdf->methods['SetSubject'] = ConfigHelper::getAppConfig('subject');


        Yii::$app->response->downloadHeaders = '123.pdf';

        //$pdf->output($htmlContent);
        return $pdf->render();
    }

    /**
     * Lists all AccessApp models.
     * @return mixed
     */
    public function actionTest()
    {
        return $this->renderPartial('test');
    }

    /**
     * Lists all AccessApp models.
     * @return mixed
     */
    public function actionTestPdf()
    {
        /**
         * @var Pdf $pdf
         */
        $css = Yii::$app->basePath . "/web/css/ec.css";
        $css = file_get_contents($css);
        $htmlContent = $this->renderPartial('test');//file_get_contents("D:/template/t2.htm");
        $pdf = Yii::$app->pdf;
        $pdf->content = $htmlContent;
        $pdf->cssInline .= $css;

        return $pdf->render();
    }

}
