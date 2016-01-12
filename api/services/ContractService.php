<?php
namespace api\services;

use api\models\Contract;
use api\models\ContractVersion;
use common\helpers\DataHelper;
use yii\base\Exception;
use yii\helpers\VarDumper;
use yii\web\Request;

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/7/21
 * Time: 23:05
 */
class ContractService
{

    /**
     * 生成合同号
     * @param bool $isAutomatic 是否自动生成
     * @return string
     */
    static function generateNumber ($isAutomatic=true,$type,$oldcontr=''){

        $arr_number=[];
        //生成号
        if($isAutomatic){
            $arr_number[]=Contract::CONTRNO_SYSTEM;
        }else{
            $arr_number[]=Contract::CONTRNO_APP;
        }

        //经营许可证号简写
        $user=AccessTokenService::getCurrentUser();
        $license=str_replace('-','',$user->org->license);
        $arr_number[]=$license;

        if($isAutomatic){
            $arr_number[]=strtoupper($type);//类型
            $arr_number[]=DataHelper::getCurrentDate('Ymd');//年月日
            $arr_number[]=substr(microtime(),2,5);//5位流水号
        }else{
            $arr_number[]=$oldcontr;
        }

        return implode('',$arr_number);
    }
}