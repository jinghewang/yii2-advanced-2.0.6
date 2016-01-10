<?php

namespace api\controllers;

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
    public function actionIndexPdf($down=false)
    {
        /**
         * @var Pdf $pdf
         */
        $css = Yii::$app->basePath . "/web/css/ec.css";
        $css = file_get_contents($css);
        $htmlContent = $this->renderPartial('inside');//file_get_contents("D:/template/t2.htm");
        $pdf = Yii::$app->pdf;
        $pdf->content = $htmlContent;
        $pdf->methods['SetHeader'] = '合同编号T<span class="color-tno">00001</span>';
        $pdf->cssInline .= $css;

        if (!$down)
            return $pdf->render();
        else{
            //$pdf->output($htmlContent, '123.pdf');
            //die;
        }

        //<pagebreak></pagebreak>
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
