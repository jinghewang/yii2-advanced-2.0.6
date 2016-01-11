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

    /**
     * Lists all AccessApp models.
     * @return mixed
     */
    public function actionIndexPdf($contr_id='1')
    {
        /**
         * @var Pdf $pdf
         * @var Contract $ec
         */

        $ec = Contract::findOne($contr_id);
        if (empty($ec))
            throw new Exception('合同不存在');

        //pdf
        $css = Yii::$app->basePath . "/web/css/ec.css";
        $css = file_get_contents($css);
        $htmlContent = $this->renderPartial('inside');//file_get_contents("D:/template/t2.htm");
        $pdf = Yii::$app->pdf;
        $pdf->cssInline .= $css;
        $pdf->content = $htmlContent;
        $pdf->filename = "电子合同-{$ec->contr_no}.pdf";
        //methods
        $pdf->methods['SetHeader'] = "合同编号<span class=\"color-tno\">{$ec->contr_no}</span>";
        $pdf->methods['SetTitle'] = ConfigHelper::getAppConfig('down');
        $pdf->methods['SetAuthor'] = ConfigHelper::getAppConfig('author');
        $pdf->methods['SetCreator'] = ConfigHelper::getAppConfig('creator');
        $pdf->methods['SetSubject'] = ConfigHelper::getAppConfig('subject');

        //$pdf->output($htmlContent);
        return $pdf->render();
    }


    /**
     * Lists all AccessApp models.
     * @return mixed
     */
    public function actionIndexTpl($contr_id='1')
    {
        /**
         * @var Pdf $pdf
         * @var Contract $ec
         */

        $ec = Contract::findOne($contr_id);
        if (empty($ec))
            throw new Exception('合同不存在');

        //pdf
        $css = Yii::$app->basePath . "/web/css/ec.css";
        $css = file_get_contents($css);
        $htmlContent = $this->renderPartial('inside.tpl');//file_get_contents("D:/template/t2.htm");
        $pdf = Yii::$app->pdf;
        $pdf->cssInline .= $css;
        $pdf->content = $htmlContent;
        $pdf->filename = "电子合同-{$ec->contr_no}.pdf";
        //methods
        $pdf->methods['SetHeader'] = "合同编号<span class=\"color-tno\">{$ec->contr_no}</span>";
        $pdf->methods['SetTitle'] = ConfigHelper::getAppConfig('down');
        $pdf->methods['SetAuthor'] = ConfigHelper::getAppConfig('author');
        $pdf->methods['SetCreator'] = ConfigHelper::getAppConfig('creator');
        $pdf->methods['SetSubject'] = ConfigHelper::getAppConfig('subject');

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
