<?php


namespace DishCheng\RobotNotice\Core;


class Result
{
    const RobotTypeOfDing='ding';
    const RobotTypeOfWechat='wechat';


    protected $errCode=0;

    protected $errMsg='';

    protected $api='';

    protected $robotType='';

    protected $reqData=[];

    protected $resData=[];

    /**
     * @return int
     */
    public function getErrCode(): int
    {
        return $this->errCode;
    }

    /**
     * @param int $errCode
     */
    public function setErrCode(int $errCode): void
    {
        $this->errCode=$errCode;
    }

    /**
     * @return string
     */
    public function getErrMsg(): string
    {
        return $this->errMsg;
    }

    /**
     * @param string $errMsg
     */
    public function setErrMsg(string $errMsg): void
    {
        $this->errMsg=$errMsg;
    }

    /**
     * @return string
     */
    public function getApi(): string
    {
        return $this->api;
    }

    /**
     * @param string $api
     */
    public function setApi(string $api): void
    {
        $this->api=$api;
    }

    /**
     * @return array
     */
    public function getReqData(): array
    {
        return $this->reqData;
    }

    /**
     * @param array $reqData
     */
    public function setReqData(array $reqData): void
    {
        $this->reqData=$reqData;
    }

    /**
     * @return array
     */
    public function getResData(): array
    {
        return $this->resData;
    }

    /**
     * @param array $resData
     */
    public function setResData(array $resData): void
    {
        $this->resData=$resData;
    }

    /**
     * @return string
     */
    public function getRobotType(): string
    {
        return $this->robotType;
    }

    /**
     * @param string $robotType
     */
    public function setRobotType(string $robotType): void
    {
        $this->robotType=$robotType;
    }

}
