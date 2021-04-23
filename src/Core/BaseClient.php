<?php


namespace DishCheng\RobotNotice\Core;


use DishCheng\RobotNotice\Entity\BaseEntityParams;
use DishCheng\RobotNotice\Exceptions\RobotNoticeException;
use DishCheng\RobotNotice\RobotNotice;


/**
 * Class BaseClient
 * @package DishCheng\Ssbooking\Core
 * @property RobotNotice app
 */
abstract class BaseClient
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * @var string
     */
    public $api='';

    /**
     * @var string
     */
    public $robotType='';


    abstract function setRobotType();

    abstract function setApi();

    /**
     * BaseClient constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app=$app;
    }


    /**
     * @return Result
     * @throws RobotNoticeException
     */
    public function postRequest()
    {
        $apiPath=$this->api;
        $result=new Result();
        $result->setApi($apiPath);
        $result->setReqData($this->app->params);
        $result->setRobotType($this->robotType);

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiPath);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->app->params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output=curl_exec($ch);

        if ($output===FALSE) {
            $output=curl_error($ch);
            curl_close($ch);
            $result->setErrCode(50000);
            $result->setErrMsg($output);
            return $result;
        }

        $output_to_arr=json_decode($output, true);
        if (blank($output_to_arr)) {
            $result->setErrCode(50001);
            $result->setErrMsg($output);
            return $result;
        }

        curl_close($ch);
        switch ($this->robotType) {
            case Result::RobotTypeOfDing:
            case Result::RobotTypeOfWechat:
                if (!isset($output_to_arr['errcode'])) {
                    $result->setErrCode(50002);
                    $result->setErrMsg($output);
                } else {
                    if ($output_to_arr['errcode']===0) {
                        //成功
                        $result->setErrCode(0);
                        $result->setErrMsg('OK');
                        $result->setResData($output_to_arr);
                    } else {
                        //失败
                        $result->setErrCode($output_to_arr['errcode']);
                        $result->setErrMsg($output_to_arr['errmsg']);
                    }
                }
                break;
            default:
                throw new RobotNoticeException('Undefined RobotType:'.$this->robotType);
        }
        return $result;
    }

}
