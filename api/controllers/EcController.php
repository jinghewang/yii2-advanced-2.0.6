<?php
namespace api\controllers;

use api\models\AccessToken;
use api\services\AjaxStatus;
use common\helpers\DataHelper;
use Yii;
use api\services\AccessTokenService;
use yii\filters\VerbFilter;


/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/7/21
 * Time: 15:51
 */
class EcController extends BaseController
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'save' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * 登录
     */
    public function actionLogin($appkey,$clientid,$client_secret)
    {
        $map = self::getRestMap();
        try {
            $token = new AccessToken();
            //$token->attributes = Yii::$app->request->queryParams;
            //$token->load(Yii::$app->request->queryParams);
            $appkey = $_REQUEST['appkey'];
            $clientid = $_REQUEST['clientid'];
            $client_secret = $_REQUEST['client_secret'];

            $token = AccessTokenService::validateAPIAuth($appkey,$clientid,$client_secret);

            //系统日志
/*            if (!LogERP::saveLogERP(LogERP::OBJECT_ORDER, $model->oid, LogERP::TYPE_DELETE, "取消订单【{$model->oid}】【酸茄子】", $model))
                throw new Exception('日志操作失败！');*/

            $map[AjaxStatus::PROPERTY_MESSAGES] = "业务处理成功";
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_SUCCESSFUL;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_OK;
            $map[AjaxStatus::PROPERTY_DATA] = $token->attributes;
        } catch (IllegalArgumentException $e) {
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_503;
            $map[AjaxStatus::PROPERTY_MESSAGES] = $e->getMessage();
        } catch (Exception $e) {
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_503;
            $map[AjaxStatus::PROPERTY_MESSAGES] = $e->getMessage();
        }
        echo json_encode($map);
    }

    /**
     * 下单
     */
    public function actionSave()
    {
        $map = self::getRestMap();
        try {

            //验证
            AccessTokenService::validateToken(Yii::$app->request);

            $data=null;

            //var_dump($_REQUEST['name']);
            //$data = SnapshotHelper::decodeToArray($data);
            //DebugService::Log('API下单',BJSON::encode($data));

            $map[AjaxStatus::PROPERTY_MESSAGES] = "业务处理成功";
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_SUCCESSFUL;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_OK;
            $map[AjaxStatus::PROPERTY_DATA] = array('oid'=>'1122121','name'=>DataHelper::getRequestParam('name'));

        } catch (IllegalArgumentException $e) {
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_503;
            $map[AjaxStatus::PROPERTY_MESSAGES] = $e->getMessage();
        } catch (Exception $e) {
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_503;
            $map[AjaxStatus::PROPERTY_MESSAGES] = $e->getMessage();
        }
        echo json_encode($map);
    }

    /**
     * 取消订单
     */
    public function actionCancel()
    {
        $map = self::getRestMap();
        try {

            if (!isset($_POST['oid'])) {
                throw new Exception('oid is null');
            }

            $oid = $_POST['oid'];
            AccessTokenService::validateToken(Yii::app()->request);
            $model = Order::model()->findByPk($oid);
            if (empty($model)) {
                throw new Exception('不存在此订单');
            } else {
              /*  $hltChannel = GroupService::hltChannel_exists($model->gid);
                if (!$hltChannel) {
                    throw new Exception('无权取消此订单');
                }*/
            }
            OrderService::orderCancel($oid);

            //系统日志
            if (!LogERP::saveLogERP(LogERP::OBJECT_ORDER, $model->oid, LogERP::TYPE_DELETE, "取消订单【{$model->oid}】【酸茄子】", $model))
                throw new Exception('日志操作失败！');

            $map[AjaxStatus::PROPERTY_MESSAGES] = "业务处理成功";
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_SUCCESSFUL;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_OK;

        } catch (IllegalArgumentException $e) {
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_503;
            $map[AjaxStatus::PROPERTY_MESSAGES] = $e->getMessage();
        } catch (Exception $e) {
            $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
            $map[AjaxStatus::PROPERTY_CODE] = AjaxStatus::CODE_503;
            $map[AjaxStatus::PROPERTY_MESSAGES] = $e->getMessage();
        }
        echo SnapshotHelper::encodeArray($map);
    }

}