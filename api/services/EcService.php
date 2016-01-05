<?php
namespace api\services;

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 2015/11/18
 * Time: 16:11
 */
class EcService
{

    //是否显示调试信息
    public $debug;


    //测试系统
    /*public $api_url ='http://test.contract-api.palmyou.com/ntsms-contract-api/service/ContractWebService?wsdl'; //正式接口地址
    public $userid = 'l-bj-cj88888-a1'; //接口账号
    public $userkey = 'aaaaaaaa'; //接口账号密码*/

    //正式系统
    public $api_url ='http://contract-api2.palmyou.com/ntsms-contract-api/service/ContractWebService?wsdl'; //正式接口地址
    public $userid = 'l-bj-cj00080-a1'; //接口账号  ||  l-bj-cj00057-a1(zhonglv)
    public $userkey = 'l-bj-cj88888-a1'; //接口账号密码

    //合同版本代码
    public $ht_ver=array('1'=>'dljn2014','2'=>'dlcj2014','3'=>'dlft2014');//1:大陆居民境内旅游合同2014 2:大陆居民出境旅游合同2014 3:大陆居民赴台湾地区旅游合同2014

    const EC_TOKEN_KEY = 'ec_token';


    /**
     * login
     * @param string $loginname
     */
    public function login(){
        $result  = $this->sys_authentication();
        $token = null;
        if ($result->result && $result->result == "success"){
            $token = $result->token;
            BCacheHelper::set(self::EC_TOKEN_KEY,$token,500);
        }
        else{
            throw new Exception(json_encode($result->errors));
        }
        return $token;
    }

    /**
     * checklogin
     * @return bool
     */
    public function checkLogin(){
        $token=BCacheHelper::get(self::EC_TOKEN_KEY,null,false);
        return !empty($token);
    }

    /**
     * logout
     */
    public function logout(){
        BCacheHelper::delete(self::EC_TOKEN_KEY);
    }

    /**
     * Post 信息
     * @author wjh 20150401
     * @param $url
     * @param $data
     * @param string $returnType
     * @return string
     * @throws Exception
     */
    public function Post($url,$data,$returnType='json'){
        try {
            $sessionid = $this->getSessionID();
            if (!empty($sessionid))
                $result = BNetHelper::curl_post($url, $data,$returnType,0,$sessionid);
            else
                $result = BNetHelper::curl_post($url, $data,$returnType);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * 上传一个文件并返回文件签名
     * @author wjh 20150401
     * @param $url
     * @param string $file
     * @return string
     */
    public function PostSingleFile($url,$file){
        try {
            $sessionid = $this->getSessionID();
            $data = $this->getUpfiles($file);
            $returnType = 'string';
            if (!empty($sessionid))
                $result = BNetHelper::curl_post($url, $data,$returnType,0,$sessionid);
            else
                $result = BNetHelper::curl_post($url, $data,$returnType);

            //处理
            $result = SnapshotHelper::decodeToArray($result);
            if (!empty($result) && count($result['files'])>0)
                return $result['files'][0]['fsign'];
            else
                return null;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * 上传多文件
     * @author wjh 20150401
     * @param $url
     * @param array $files
     * @return string
     */
    public function PostFile($url,$files){
        try {
            $sessionid = $this->getSessionID();
            $data = $this->getUpfiles($files);
            $returnType = 'string';
            if (!empty($sessionid))
                $result = BNetHelper::curl_post($url, $data,$returnType,0,$sessionid);
            else
                $result = BNetHelper::curl_post($url, $data,$returnType);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * get post url
     * @author wjh 20150401
     * @param $url
     * @return string
     * @throws Exception
     */
    public function getPostUrl($url){
        try {
            $returnType = BDataHelper::getHltConfig('apitype','array');
            return BDataHelper::getHltConfig('api').$url.($returnType=='json'?'Json':'');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * get post url
     * @author wjh 20150401
     * @param $url
     * @return string
     * @throws Exception
     */
    public function getPostUrl2($url){
        try {
            return BDataHelper::getHltConfig('api').$url;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * 获取上传路径
     * @author wjh 20150407
     * @param $files
     * @return array
     */
    public function getUpfiles($files){
        $data = array();
        if (!is_array($files))
            $files = array($files);

        foreach ($files as $key => $file) {
            /*if (!file_exists(realpath($file)))
                throw new Exception('文件不存在：' . $file);*/

            if (class_exists('CURLFile')) {
                $data['file' . $key] = new CURLFile(realpath($file));
            } else {
                $data['file' . $key] = '@' . realpath($file);
            }
        }
        return $data;
    }

    /**
     * @author lvkui
     * @date 20150409
     * @param $filePath
     * @return string
     */
    public  function getFilePath($filePath){
        return dirname(__FILE__).str_replace('/',DIRECTORY_SEPARATOR,'..'.DIRECTORY_SEPARATOR.'..'.$filePath);
    }

    /**
     * wirte log
     * @author wjh 20150401
     * @param $name
     * @param null $content
     * @param int $typeid
     * @throws Exception
     */
    public function Log($name,$content=null,$typeid=0){
        $logtype = Yii::app()->params['switch']['logtype'];
        if (!empty($logtype) && $logtype == 'table'){
            DebugService::Log($name,$content=null,$typeid=0);
        }
        else{
            BDataHelper::print_r($name);
            BDataHelper::print_r($content);
        }
    }

    /**
     * get script array
     * @author wjh 20150401
     * @param $data
     * @return string
     */
    public function getScriptArray($data)
    {
        $data2 = array();
        foreach ($data as $key => $value) {
            $data2[] = "$key:'$value',";
        }
        return '{' . implode(',', $data2) . '}';
    }

    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return BCacheHelper::get(self::EC_TOKEN_KEY,null,false);
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        BCacheHelper::set(self::EC_TOKEN_KEY,$token,500);
    }

    /**
     * php 数组转换为 java 数组发送
     * @author wjh 20150404
     * @param $data
     * @param string $key array key
     * @return mixed string or array
     */
    public function php2java($data,$key=null){
        $rmsg = array();
        $key = empty($key) ? 'data' : $key;
        $returnType = BDataHelper::getHltConfig('apitype', 'array');
        if ($returnType == 'json')
            $rmsg = array($key => SnapshotHelper::encodeArray($data));
        else
            $this->php2java_internal($data, '', $rmsg);
        unset($data);
        return $rmsg;
    }


    private function php2java_internal($data,$prestr='',&$result){
        if (BArrayHelper::isKeyArray($data)){//key array
            foreach ($data as $dkey => $dvalue) {
                $dkey = empty($prestr)? $dkey:$prestr.'.'.$dkey;
                if (!is_array($dvalue)) {
                    $msg = $dkey . '=' . $dvalue;
                    $result[$dkey] = $dvalue;
                } else {
                    $this->php2java_internal($dvalue,$dkey,$result);
                }
            }
        }
        else{//index array
            foreach ($data as $dkey => $dvalue) {
                $dkey = $prestr.'['.$dkey .']';
                if (!is_array($dvalue)) {
                    $msg = $dkey . '=' . $dvalue;
                    $result[$dkey] = $dvalue;
                } else {
                    $this->php2java_internal($dvalue,$dkey,$result);
                }
            }
        }
    }

    /**
     * 写入操作日志
     * @param $orderId 订单id
     * @param $result 结果信息
     * @param $title 标题
     * @return bool
     * @throws Exception
     */
    public function setResult($orderId, $result,$title)
    {
        //处理结果
        /**
         * @var TourContract $model
         */

        $model = TourContract::model()->findByAttributes(array('oid' => $orderId));
        $model->ec_time = BDataHelper::getCurrentTime();
        $model->ec_erp_userid = BDataHelper::getCurrentUserid();
        if ($result->result == 'success') {
            if (isset($result->contract)){
                $contract = $result->contract;
                $model->ec_uid = $contract->uid;
            }
            $model->ec_status = 1;
        } else {
            //$model->ec_uid = null;
            $model->ec_status = -1;
        }

        $data = empty($model->ec_result) ? array() : json_decode($model->ec_result);
        $data[] = array(
            'userid' => BDataHelper::getCurrentUserid(),
            'username' => BDataHelper::getCurrentUser()->name,
            'title' => $title,
            'time' => BDataHelper::getCurrentTime(),
            'status' => $result->result,
            'result' => $result,
        );
        $model->ec_result = json_encode($data);
        if (!$model->save())
            throw new Exception(BDataHelper::getErrorMsg('绑定合同错误,原因：' . json_encode($model->errors)));

        return true;
    }


    protected function getRestMap() {
        $map = array();
        $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
        return $map;
    }


    //set_time_limit(0);//解决运行时间过长:单位/秒,0=无限制
    //从5.2版本开始，PHP原生提供json_encode()和json_decode()函数，前者用于编码JSON，后者用于解码JSON。
    /************************************************************************************
     * 电子合同-金棕榈
     *
     *
     * 接口核心程
     *http://test.contract-api.palmyou.com/ntsms-contract-api/service/ContractWebService?wsdl
     */

    /*-----------------------------------------------------------------------------------------------
     * 登录
     * @param {} $usrname 用户名
     * @param {} $conditonExp 过滤条件表达式
     * @return 返回JSON结果
    -----------------------------------------------------------------------------------------------*/
    function sys_authentication(){
        //global $api_url,$userid,$userkey;
        $client = $this->getSoapClient();
        $param = array('code'=>$this->userid,'password'=>md5($this->userkey));
        $res=$client->__Call('authentication',array('paramters'=>$param));
        $result=$res->return;//json
        $usr=json_decode($result); //$usr->token;
        return $usr;
    }


    /**
     * getSoapClient
     * @return SoapClient
     */
    function getSoapClient(){
        //$client = new SoapClient($this->api_url, array('proxy_host' => "127.0.0.1",'proxy_port' => '8888','encoding'=>'utf8'));
        $client = new SoapClient($this->api_url, array('encoding'=>'utf8'));
        return $client;
    }




    /*-----------------------------------------------------------------------------------------------
    * 提交电子合同
    * 返回结果：
    * {
    *     "result": "success",
    *     "contract": {
    *         "uid": "32dd01c7-b449-47ee-b064-d9390f0bba3b",
    *         "no": "TBJCJ00080111000"
    *     },
    *     "token": "9bde65c1-0b1d-4da7-808f-04f41ad6c6d320151119152914"
    * }
    * @param token 通过authentication获得的身份认证令牌
    * @param submitContractRequest  提交电子合同请求参数对象
    * @return 返回JSON结果
    -----------------------------------------------------------------------------------------------*/
    function sys_submitContract($ver_code=1,$orderId,$method = 'submitContract'){
        //global $api_url,$userid,$userkey,$ht_ver;
        //登录
        if($this->login())
            $token=$this->getToken();

        $submitRequest=array();

        /**
         * @var Order $order_arr
         * @var Group $group_arr
         * @var TourContract $ht_arr
         * @var OrderMember[] $members
         * @var OrderMember $signMember
         * @var User $orderUser
         */

        //$ht_arr=getall("select * from hl_contracts where oid='".$orderId."'");//合同
        //$order_arr=getall("select * from hzw_order where SID='".$orderId."'");//订单


        $order_arr = Order::model()->findByPk($orderId);
        $ht_arr= TourContract::model()->findByAttributes(array('contr_no'=>$order_arr->contr_no));//合同
        $group_arr = $order_arr->group;
        $signMember = $order_arr->ordermembers[0];
        $members = $order_arr->ordermembers;
        $orderUser = User::model()->findByPk($order_arr->order_userid);

        //补充协议
        $extra_data=TourContractForm::getExtra_data($ht_arr);

        if($ver_code==1){//1:国内旅游合同

        }elseif($ver_code==2){//2:出境旅游合同

        }elseif($ver_code==3){//3:赴台湾地区旅游合同

        }

        $guideprice=GroupExtra::getExtraData($order_arr->parentgroup,GroupForm::ATTRIBUTENAME_GUIDE_PRICE);
        if(empty($guideprice)){
            $guideprice='0';
        }

        //--------从hl_contracts表中读取----------
        $submitRequest['version'] = $this->ht_ver[$ver_code];//合同版本名称
        $submitRequest['travelname'] = $signMember->cn_name;//旅游者代表
        $submitRequest['travelmobile'] = $signMember->mobile;//旅游者代表手机号
        $submitRequest['transactor'] = $ht_arr->user->name;//经办人
        $submitRequest['price'] =$extra_data['price'];//费用合计
        $submitRequest['no'] =EcTools::getEcCno($ht_arr->contr_no);//合同号

        //合同详情表 contractJSON	ContractJSON
        $contractJSON=array();

        //旅游者代表相关信息
        $contractJSON['traveler']= EcTools::getTravelerJson($ver_code,$order_arr);

        //地接社信息
        $contractJSON['supplier']= EcTools::getSupplierJson($ver_code,$order_arr);

        //旅行社信息(组团社信息)
        $contractJSON['groupcorp']= EcTools::getGroupcorpJson($ver_code,$order_arr);

        //旅游线路相关信息
        $contractJSON['line']= EcTools::getLineJson($ver_code,$order_arr);

        //旅游费用支付方式及时间
        $contractJSON['pay'] = EcTools::getPayJson($ver_code, $order_arr,$extra_data);

        //保险事项
        $contractJSON['insurance']= EcTools::getInsuranceJson($ver_code, $order_arr,$extra_data);

        //成团约定
        $contractJSON['group']= EcTools::getGroupJson($ver_code, $order_arr);

        //黄金周特别约定
        $contractJSON['goldenweek']= EcTools::getGoldenWeekJson($ver_code, $order_arr);

        //争议处理
        $contractJSON['controversy'] = EcTools::getControversyJson($ver_code, $order_arr);

        //其他事项
        $contractJSON['other']=EcTools::getOtherJson($ver_code, $order_arr,$extra_data);

        $submitRequest['contractJSON']=$contractJSON;


        //电子合同团队信息---从hzw_order表中读取
        $contractTeam = array();
        $contractTeam['linename'] = $group_arr->title;//线路名称
        $contractTeam['teamcode'] = $group_arr->gid;//团号
        $contractTeam['days'] =$extra_data['days'];//行程天数
        $contractTeam['nights']=$extra_data['nights']; //几晚
        $contractTeam['bgndate'] = BDataHelper::getDate($group_arr->group_date);//出团日期
        $contractTeam['enddate'] = $group_arr->end_date;//返回日期
        $contractTeam['qty'] = intval($order_arr->num);//旅游人数
        $contractTeam['startcity']=$group_arr->parentgroup->groupplan->from;
        //BDataHelper::print_r($contractTeam);die;
        //--------从hzw_group_journey表中读取----------
        $routes=array();
        //$j_arr=getall("select * from hzw_group_journey where BillID='".$order_arr[0]['GroupId']."' and GroupType='".$order_arr[0]['GroupType']."'");

        $days_arr = GItem::model()->findAllBySql('select g.* from gitem g where g.parentid in (select g1.iid FROM gitem g1 where g1.gid=\''.$group_arr->gid.'\' and g1.ctype=\''.PItem::CTYPE_JOURNEY.'\')');
        if (empty($days_arr))
            $days_arr = GItem::model()->findAllBySql('select g.* from gitem g where g.parentid in (select g1.iid FROM gitem g1 where g1.gid=\''.$group_arr->parent_gid.'\' and g1.ctype=\''.PItem::CTYPE_JOURNEY.'\')');

        $gid = $days_arr[0]->gid;
        $city_arr = GItem::model()->findAll(array('condition'=>"gid='{$gid}' and ctype='".PItem::CTYPE_CITY."'", 'order' => 'iid'));

        $i=0;
        /**
         * @var GItem $item
         * @var GItem $journey_item
         */
        foreach($days_arr as $item){
            $routes[$i]['day']= $i+1;//$j->title;//第几天行程
            $journey_item = GItem::model()->with('ginfo')->findByAttributes(array('parentid'=>$item->iid));
            //--
            $cities = BArrayHelper::array_func($city_arr,null,function($k,$v)use($item){
                return $v->parentid == $item->iid;
            });
            if(empty($cities)){
                throw new Exception('团信息 行程区域不完成');
            }
            $city_depart = $cities[0];
            $city_arrive = count($cities) > 0 ? $cities[count($cities) - 1] : null;
            $city_in = null;
            if (count($cities) > 2)
                $city_in = array_slice($cities, 1, count($cities) - 2);

            //------
            $routes[$i]['stop'] = 1;//当天行程第几站
            $routes[$i]['title'] = $item->title;//当天行程第几站
            $routes[$i]['departcity'] = EcTools::getSortName($city_depart->title);//$j['departcity'];//出发地
            $routes[$i]['arrivecity'] = EcTools::getSortName($city_arrive->title);//$j['arrivecity'];//前往地
            $routes[$i]['arrivestate'] = EcTools::getSortProvinceName($city_arrive->title);// '北京';//$j['arrivestate'];//前往省市
            $routes[$i]['arrivenation'] = EcTools::getSortCountryName($city_arrive->title);// '中国';//$j['arrivenation'];//前往国家
            $routes[$i]['trip'] = ($journey_item && $journey_item->ginfo) ? strip_tags($journey_item->ginfo->content,'<p>') : '无';//'游览行程游览行程游览行程';//游览行程
            $i++;
        }
        $contractTeam['routes']=$routes;

        //--------从hl_guest表中读取----------
        $guests=array();
        //$g_arr=getall("select * from hl_guest where orderId='".$orderId."' and vtype='".$order_arr[0]['GroupType']."' and itemId='".$order_arr[0]['GroupId']."'");

        /**
         * @var OrderMember $g
         */
        $i=0;
        foreach ($members as $g) {
            $guests[$i]['idtype'] = BDefind::getValue(EcTools::$EC_CERT_TYPE,$g->cert_type);//$g->cert_type;//证件类型
            $guests[$i]['idcode'] = $g->cert_no;//证件号
            $guests[$i]['name'] = $g->cn_name;//姓名
            $guests[$i]['sex'] =  BDefind::getValue(BDefind::$SEX,empty($g->gender)?1:$g->gender)  ;//$g->gender;//性别
            $guests[$i]['birthday'] = empty($g->birthday)?null: BDataHelper::getDate($g->birthday);//生日
            $guests[$i]['nation']=$g->nation;
            $guests[$i]['folk']=$g->minority;
            $guests[$i]['mobile'] = $g->mobile;
            $guests[$i]['no'] = $i + 1;//名单序号
            $i++;
        }

        $contractTeam['guests']=$guests;

        //clob里面再按照json格式  拼接小字段,可以按照不同的合同示范文本自定义小子段
        $submitRequest['contractTeam'] = $contractTeam;//合同团队

        try{
            $client = $this->getSoapClient();
            $param = array('token'=>$token,'submitContractRequest'=>$submitRequest);
           /* echo json_encode($param);
            die;*/
            if (isset($_REQUEST['json'])){
                echo json_encode($param);
                die;
            }
            if (isset($_REQUEST['debug'])){
                BDataHelper::print_r($param);
                die;
            }

            //submitContract
            $res=$client->__Call($method,array('paramters'=>$param));
            $result=$res->return;//json
            //var_dump($res);die;
            $result=json_decode($result);
            //BDataHelper::print_r($result);die;
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception(BDataHelper::getErrorMsg('绑定合同错误soapFault,原因：'.$soapFault->getMessage()));
            //echo $soapFault;
        }
        //-----------
        //return $result;
    }


    function sys_submitContract_Single($ver_code=1,$data,$method = 'submitContract'){
        //global $api_url,$userid,$userkey,$ht_ver;
        //登录
        if($this->login())
            $token=$this->getToken();

        $submitRequest=array();


        if(!is_array($data)){
            $data=BJSON::decode($data);
        }

        if($ver_code==1){//1:国内旅游合同

        }elseif($ver_code==2){//2:出境旅游合同

        }elseif($ver_code==3){//3:赴台湾地区旅游合同

        }

        //--------从hl_contracts表中读取----------
        $submitRequest['version'] = $this->ht_ver[$ver_code];//合同版本名称
        $submitRequest['travelname'] = $data['name'];//旅游者代表
        $submitRequest['travelmobile'] = $data['travelmobile'];//旅游者代表手机号
        $submitRequest['transactor'] = $data['transactor'];//经办人
        $submitRequest['price'] = $data['price'];//费用合计
        $submitRequest['no'] = EcTools::CORPCODE2 .$data['no'];//合同号

        //合同详情表 contractJSON	ContractJSON
        $contractJSON=array();

        //旅游者代表相关信息
        $contractJSON['traveler']= EcTools::getJsonData(array('traveler'=>$data['name'],'addr'=>''));

        //地接社信息
        $contractJSON['supplier']= EcTools::getJsonData(array());

        //旅行社信息(组团社信息)
        $contractJSON['groupcorp']= EcTools::getJsonData(array(
            'corp' => EcTools::CORP,//corp 旅行社 true
            'corpCode' => EcTools::CORPCODE,//corpCode 旅行社业务经营许可证编号 true
            'scope' => EcTools::SCOPE//scope 经营范围 true
        ));

        //旅游线路相关信息
        $contractJSON['line']= EcTools::getJsonData(array(
            'linename'=>$data['linename'],
            'teamcode'=>$data['teamcode']
        ));

        //旅游费用支付方式及时间
        $contractJSON['pay'] = EcTools::getJsonData(array());

        //保险事项
        $contractJSON['insurance']= EcTools::getJsonData(array());

        //成团约定
        $contractJSON['group']= EcTools::getJsonData(array());

        //黄金周特别约定
        $contractJSON['goldenweek']= EcTools::getJsonData(array());

        //争议处理
        $contractJSON['controversy'] = EcTools::getJsonData(array());

        //其他事项
        $contractJSON['other']=EcTools::getJsonData(array());

        $submitRequest['contractJSON']=$contractJSON;


        //电子合同团队信息---从hzw_order表中读取
        $contractTeam = array();
        $contractTeam['linename'] = $data['linename'];//线路名称
        $contractTeam['teamcode'] = $data['teamcode'];//团号
        $contractTeam['days'] = $data['days'];//行程天数
        $contractTeam['bgndate'] = $data['bgndate'];//出团日期
        $contractTeam['enddate'] = $data['enddate'];//返回日期
        $contractTeam['qty'] = intval($data['qty']);//旅游人数

        //行程信息
        $contractTeam['routes']=EcTools::getJsonData(array());

        //游客信息
        $contractTeam['guests']=array('0'=>array(
            'idtype'=>EcTools::$EC_CERT_TYPE[$data['idtype']],
            'idcode'=>$data['idcode'],
            'name'=>$data['name'],
            'sex'=>$data['ses'],
            'birthday'=>'',
            'no'=>1,
        ));

        //clob里面再按照json格式  拼接小字段,可以按照不同的合同示范文本自定义小子段
        $submitRequest['contractTeam'] = $contractTeam;//合同团队

        try{
            $client = $this->getSoapClient();;
            $param = array('token'=>$token,'submitContractRequest'=>$submitRequest);
            if (isset($_REQUEST['json'])){
                echo json_encode($param);
                die;
            }
            if (isset($_REQUEST['debug'])){
                BDataHelper::print_r($param);
                die;
            }

            //submitContract
            $res=$client->__Call($method,array('paramters'=>$param));
            $result=$res->return;//json
            //var_dump($res);die;
            $result=json_decode($result);
            BDataHelper::print_r($result);die;
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception(BDataHelper::getErrorMsg('绑定合同错误soapFault,原因：'.$soapFault->getMessage()));
            //echo $soapFault;
        }
        //-----------
        //return $result;
    }
    /*-----------------------------------------------------------------------------------------------
     * 取消电子合同
     * @param {}  string $ht_sid 合同号
     * @param {} string  $ht_no 合同号
     * @return 返回JSON结果
    -----------------------------------------------------------------------------------------------*/
    function sys_cancelContract($ht_sid,$ht_no){
        //登录
        if($this->login())
            $token=$this->getToken();

        $cancelRequest=array();
        $cancelRequest['id']=$ht_sid;//合同ID
        $cancelRequest['no']=$ht_no;//合同号

        try{
            $client = $this->getSoapClient();
            $param = array('token'=>$token,'cancelContractRequest'=>$cancelRequest);
            $res=$client->__Call('cancelContract',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception($soapFault->getMessage());
        }
    }


    /**
     * 根据合同号获取合同uuid
     * @param string $ht_no 合同号
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getContractUuid($ht_no){
        //登录
        if($this->login())
            $token=$this->getToken();

        try{
            $client = $this->getSoapClient();
            $param = array('token'=>$token,'contractno'=>$ht_no);
            $res=$client->__Call('getContractUuid',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception($soapFault->getMessage());
        }
    }

    /**
     * 获取合同的手机号和验证码
     * @param string $sid 合同id
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getGetMsgCode($sid){
        //登录
        if($this->login())
            $token=$this->getToken();

        try{
            $client = $this->getSoapClient();
            $param = array('token'=>$token,'contractid'=>$sid);
            $res=$client->__Call('getMsgCode',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception($soapFault->getMessage());
        }
    }

    /**
     * 根据合同id获取合同签字时间
     * @param string $sid 合同id
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getSignCreate($sid){

        //登录
        if($this->login())
            $token=$this->getToken();

        try{
            $client = $client = $this->getSoapClient();
            $param = array('token'=>$token,'contractid'=>$sid);
            $res=$client->__Call('getSignCreate',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception($soapFault->getMessage());
        }
    }


    /**
     * 根据合同id获取合同签字时间
     * @param string $sid 合同id
     * @return 返回JSON结果
     * @throws Exception
     */
    function sys_getResendMsg($sid,$guestname,$guestmobile){
        //登录
        if($this->login())
            $token=$this->getToken();

        try{
            $client = $client = $this->getSoapClient();
            $param = array('token'=>$token,'contractid'=>$sid,'guestname'=>$guestname,'guestmobile'=>$guestmobile);
            $res=$client->__Call('resendMsg',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw new Exception($soapFault->getMessage());
        }
    }


    /*-----------------------------------------------------------------------------------------------
     * 取消电子合同
     * @param {}  string $ht_sid 合同号
     * @param {} string  $ht_no 合同号
     * @return 返回JSON结果
    -----------------------------------------------------------------------------------------------*/
    function sys_submitStatus($ht_sid,$ht_no){
        //登录
        if($this->login())
            $token=$this->getToken();

        $cancelRequest=array();
        $cancelRequest['id']=$ht_sid;//合同ID
        $cancelRequest['no']=$ht_no;//合同号

        try{
            $client = $client = $this->getSoapClient();
            $param = array('token'=>$token,'submitStatusRequest'=>$cancelRequest);
            $res=$client->__Call('submitStatus',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw $soapFault;
        }
    }


    /*-----------------------------------------------------------------------------------------------
     * 取消电子合同
     * @param {}  string $ht_sid 合同号
     * @param {} string  $ht_no 合同号
     * @return 返回JSON结果
    -----------------------------------------------------------------------------------------------*/
    function sys_submitSign($ht_sid,$base64){
        //登录
        if($this->login())
            $token=$this->getToken();

        $cancelRequest=array();
        $cancelRequest['id']=$ht_sid;//合同ID
        $cancelRequest['base64image']=$base64;//图片base64信息

        try{
            $client = $client = $this->getSoapClient();
            $param = array('token'=>$token,'complementSignRequest'=>$cancelRequest);
            $res=$client->__Call('submitSign',array('paramters'=>$param));
            $result=$res->return;//json
            $result=json_decode($result);
            return $result;
        }catch (SoapFault $soapFault) {
            throw $soapFault;
        }
    }

    /**
     * 电子合同下载
     * @param $ecNo 电子合同号
     * @throws Exception
     */
    public static  function  getDownLoadUrl($ecNo){
        $ec=new EcService();
        $ecno=EcTools::getEcCno($ecNo);
        $userkey=md5($ec->userkey);
        return "http://i.lyht.cn/ntsms-contract/ws/downloadPDF/{$ec->userid}/{$userkey}/{$ecno}/1";
    }

    /**
     * 电子合同预览
     * http://i.lyht.cn/ntsms-contract/ws/view/{$ec->userid}/{$userkey}/{$ecno}   包含导出PDF及二维码功能
     * 导出PDF暂时不可用
     * @param $ecNo
     * @return string
     */
    public static function getViewUrl($ecNo){
        $ec=new EcService();
        $ecno=EcTools::getEcCno($ecNo);
        $userkey=md5($ec->userkey);
        return "http://i.lyht.cn/ntsms-contract/ws/view/{$ec->userid}/{$userkey}/{$ecno}?simple=true";
    }

}