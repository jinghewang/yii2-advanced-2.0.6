<?php
namespace api\controllers;

use api\services\AjaxStatus;
use yii\web\Controller;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 *
 * @property bolean $debug 是否输出调试信息
 *
 */
class BaseController extends Controller
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/column2';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public $request;

    public $user;

    //是否显示调试信息
    public $debug;

    public $defaultAction='index';



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


    protected function getRestMap() {
        $map = array();
        $map[AjaxStatus::PROPERTY_STATUS] = AjaxStatus::STATUS_FAILED;
        return $map;
    }

}