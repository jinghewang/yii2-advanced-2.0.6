<?php
namespace api\services;
use api\models\Chargeable;
use api\models\Contract;
use api\models\Group;
use api\models\Other;
use api\models\Routes;
use api\models\ShopAgreement;
use api\models\Text;
use api\models\Traveller;
use common\helpers\BaseDataHelper;
use common\helpers\DataHelper;
use api\services\ContractService;
use yii\base\Exception;
use Yii;

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 2015/11/18
 * Time: 16:11
 */
class EcService
{
    /**
     * 上传或者提交合同
     * @author lvkui
     * @param $data
     * @param bool $method
     * @throws \Exception
     * @throws \yii\base\Exception
     */
    function sys_submitContract($data,$method=true){
        $tran=null;
        try{
            $tran = Yii::$app->db->beginTransaction();
            if(!isset($data['contract'])||$this->isStrEmpty($data['contract'])){
                throw new Exception('an empty string is not allowed for $contract');
            }

            $user=AccessTokenService::getCurrentUser();
            //电子合同
            $ec=$data['contract'];
            $model= new Contract();
            $model->vercode=$ec['vercode'];
            $model->type=$ec['type'];
            $model->is_lock=Contract::CONTRACT_NO;
            $model->status=$method?Contract::CONTRACT_STATUS_COMMITIN:Contract::CONTRACT_STATUS_UNCOMMIT;
            $model->audit_status=$user->org->isaudit?Contract::CONTRACT_YES:Contract::CONTRACT_NO;
            $model->is_submit=$model->status;
            $model->sub_time=$model->is_submit?DataHelper::getCurrentTime():'';
            $model->price=$ec['price'];
            $model->num=$ec['num'];
            $model->transactor=$ec['transactor'];
            $model->oldcontr=$ec['contr_no'];
            $model->save();

            //线路信息
            if(isset($data['group'])){
                $g=$data['group'];
                $gModel=new Group();
                $gModel->contr_id=$model->contr_id;
                $gModel->teamcode=$g['teamcode'];
                $gModel->linename=$g['linename'];
                $gModel->personLimit=$g['personLimit'];
                $gModel->payGuide=$g['payGuide'];
                $gModel->days=$g['days'];
                $gModel->nights=$g['nights'];
                $gModel->bgndate=$g['bgndate'];
                $gModel->enddate=$g['enddate'];
                $gModel->from=$g['from'];
                $gModel->aim=$g['aim'];
                $gModel->save();
            }

            //游客信息
            if(isset($data['traveller'])){
                $t=$data['traveller'];
                $tModel=new Traveller();
                $tModel->contr_id=$model->contr_id;
                $tModel->name=$t['name'];
                $tModel->sex=$t['sex'];
                $tModel->birthday=$t['birthday'];
                $tModel->nation=$t['nation'];
                $tModel->folk=$t['folk'];
                $tModel->mobile=$t['mobile'];
                $tModel->idtype=$t['idtype'];
                $tModel->idcode=$t['idcode'];
                $tModel->addr=$t['addr'];
                $tModel->no=$t['no'];
                $tModel->is_leader=$t['is_leader'];
                if($tModel->is_leader){
                    $tModel->extra_data=$t['extra_data'];
                }
                $tModel->save();
            }

            //行程信息
            if(isset($data['routes'])){
                $r=$data['routes'];
                if(!empty($r['journeys'])){
                    foreach($r['journeys'] as $k=>$j){
                        $rModel=new Routes();
                        $rModel->contr_id=$model->contr_id;
                        $rModel->parentid='0';
                        $rModel->title=$j['title'];
                        $rModel->ctype=Routes::ROUTE_TYPE_JOURNEY;
                        $rModel->index=$j['index'];
                        if($rModel->save()){
                            $parentid=$rModel->id;
                            if(!empty($j['citys'])){
                                foreach($j['citys'] as $i=>$c){
                                    $cModel=new Routes();
                                    $cModel->contr_id=$model->contr_id;
                                    $cModel->parentid=$parentid;
                                    $cModel->title=$c['title'];
                                    $cModel->ctype=Routes::ROUTE_TYPE_CITY;
                                    $cModel->transit=$c['transit'];
                                    $cModel->index=$c['index'];
                                    $cModel->from=$c['from'];
                                    $cModel->aim_city=$c['aim_city'];
                                    $cModel->aim_country=$c['aim_country'];
                                    $cModel->sign=DataHelper::getSign($c['content']);
                                    $text=Text::findOne($cModel->sign);
                                    if(empty($text)){
                                        $text->sign=$cModel->sign;
                                        $text->content=$c['content'];
                                        $text->save();
                                    }

                                    //$cModel->extra_data=$c['extra_data'];
                                    $cModel->save();
                                }
                            }
                        }
                    }
                }
            }

            //购物协议
            if(isset($data['shops'])){
                foreach($data['shops'] as $shop){
                    $sModel= new  ShopAgreement();
                    $sModel->contr_id=$model->contr_id;
                    $sModel->name=$shop['name'];
                    $sModel->addr=$shop['addr'];
                    $sModel->time=$shop['time'];
                    $sModel->goods=$shop['goods'];
                    $sModel->duration=$shop['duration'];
                    $sModel->memo=$shop['memo'];
                    $sModel->agree=$shop['agree'];
                    $sModel->index=$shop['index'];
                    $sModel->save();
                }
            }

            //自费协议
            if(isset($data['chargeables'])){
                foreach($data['chargeables'] as $charge){
                    $chModel= new  Chargeable();
                    $chModel->contr_id=$model->contr_id;
                    $chModel->name=$charge['name'];
                    $chModel->addr=$charge['addr'];
                    $chModel->time=$charge['time'];
                    $chModel->price=$charge['price'];
                    $chModel->duration=$charge['duration'];
                    $chModel->memo=$charge['memo'];
                    $chModel->agree=$charge['agree'];
                    $chModel->index=$charge['index'];
                    $chModel->save();
                }
            }

            //合同其它信息
            if(isset($data['other'])){
                $other=$data['other'];
                $oModel=new Other();
                $oModel->contr_id=$model->contr_id;
                $oModel->groupcorp=$other['groupcorp'];
                $oModel->pay=$other['pay'];
                $oModel->insurance=$other['insurance'];
                $oModel->group=$other['group'];
                if(!empty($other['goldenweek'])){
                    $oModel->goldenweek=$other['goldenweek'];
                }

                if(!empty($other['controversy'])){
                    $oModel->controversy=$other['controversy'];
                }
                $oModel->other=$other['other'];
                $oModel->effect=$other['effect'];
                $oModel->save();
            }

            $tran->commit();
        }catch (Exception $e){
            $tran->rollBack();
            throw $e;
        }
    }

    /**
     * @取消电子合同
     * @author lvkui
     * @param $data
     * @throws \Exception
     * @throws \yii\base\Exception
     */
    function sys_cancelContract($data){
        try{
            if(!isset($data['contr_id'])||$this->isStrEmpty($data['contr_id'])){
                throw new Exception('an empty string is not allowed for $contr_id');
            }

            if(!isset($data['contr_no'])||$this->isStrEmpty($data['contr_no'])){
                throw new Exception('an empty string is not allowed for $contr_no');
            }

            $ec=Contract::find()->where(['contr_id'=>$data['contr_id'],'contr_no'=>$data['contr_no']])->one();
            if(empty($ec)){
                throw new Exception('contract does not exist');
            }
            $ec->status=Contract::CONTRACT_STATUS_CANCEL;
            $ec->update();
        }catch (Exception $e) {
            throw $e;
        }
    }


    /**
     * 根据合同号获取合同uuid
     * @param $contr_no 合同号
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getContractUuid($data){
        try{

            if(!isset($data['contr_no'])||$this->isStrEmpty($data['contr_no'])){
                throw new Exception('an empty string is not allowed for $contr_no');
            }

            $ec=Contract::find()->where(['contr_id'=>$data['contr_id'],'contr_no'=>$data['contr_no']])->one();
            if(empty($ec)){
                throw new Exception('contract does not exist');
            }
            return ['contr_id'=>$ec->contr_id];
        }catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * 获取合同的手机号和验证码
     * @param string $sid 合同id
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getGetMsgCode($sid){
        //TODO:缺少实现
    }

    /**
     * 根据合同id获取合同签字时间
     * @param $data
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getSignCreate($data){

        try{
            if(!isset($data['contr_id'])||$this->isStrEmpty($data['contr_id'])){
                throw new Exception('an empty string is not allowed for $contr_id');
            }

            $ec=Contract::find()->where(['contr_id'=>$data['contr_id']])->one();
            if(empty($ec)){
                throw new Exception('contract does not exist');
            }

            return ['issign'=>$ec->status==Contract::CONTRACT_STATUS_SIGNED?'1':'0','signtime'=>$ec->sign_time];
        }catch (Exception $e) {
            throw $e;
        }
    }


    /**
     * 重发短信功能
     * @author lvkui
     * @param $data
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getResendMsg($data){
        try{
            if(!isset($data['contr_id'])||$this->isStrEmpty($data['contr_id'])){
                throw new Exception('an empty string is not allowed for $contr_id');
            }

            if(!isset($data['guestname'])||$this->isStrEmpty($data['guestname'])){
                throw new Exception('an empty string is not allowed for $guestname');
            }

            if(!isset($data['guestmobile'])||$this->isStrEmpty($data['guestmobile'])){
                throw new Exception('an empty string is not allowed for $guestmobile');
            }

            $ec=Contract::find()->where(['contr_id'=>$data['contr_id'],'contr_no'=>$data['contr_no']])->one();
            if(empty($ec)){
                throw new Exception('contract does not exist');
            }

            //Todo:缺少重发短信功能

        }catch (Exception $e) {
            throw $e;
        }
    }


    /**
     * @更改合同状态[未提交--提交]
     * @author lvkui
     * @param $data
     * @throws \Exception
     * @throws \yii\base\Exception
     */
    function sys_submitStatus($data){

        try{
            if(!isset($data['contr_id'])||$this->isStrEmpty($data['contr_id'])){
                throw new Exception('an empty string is not allowed for $contr_id');
            }

            if(!isset($data['contr_no'])||$this->isStrEmpty($data['contr_no'])){
                throw new Exception('an empty string is not allowed for $contr_no');
            }

            $ec=Contract::find()->where(['contr_id'=>$data['contr_id'],'contr_no'=>$data['contr_no']])->one();
            if(empty($ec)){
                throw new Exception('contract does not exist');
            }
            if($ec->status=Contract::CONTRACT_STATUS_UNCOMMIT){
                $ec->status=Contract::CONTRACT_STATUS_COMMITIN;
                $ec->update();
            }
        }catch (Exception $e) {
            throw $e;
        }
    }


    /**
     * 补充签名信息
     * @authro lvkui
     * @param $data
     * @throws \Exception
     * @throws \yii\base\Exception
     */
    function sys_submitSign($data){

        try{
            if(!isset($data['contr_id'])||$this->isStrEmpty($data['contr_id'])){
                throw new Exception('an empty string is not allowed for $contr_id');
            }

            if(!isset($data['base64image'])||$this->isStrEmpty($data['base64image'])){
                throw new Exception('an empty string is not allowed for $base64image');
            }

            //TODO:缺少补充签名信息，暂不提供

        }catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * 是否为空
     * @param $name
     * @return bool
     */
    public  function isStrEmpty($name){
        $empty=true;
        if(isset($name)){
            if($name==0){
                $empty= false;
            }elseif(!empty($name)){
                $empty= false;
            }
        }
        return $empty;
    }


}