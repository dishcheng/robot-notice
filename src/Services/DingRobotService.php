<?php

namespace DishCheng\RobotNotice\Services;

use DishCheng\RobotNotice\Core\BaseClient;
use DishCheng\RobotNotice\Core\Container;
use DishCheng\RobotNotice\Core\Result;
use DishCheng\RobotNotice\Entity\DingEntityParams;

class DingRobotService extends BaseClient
{
    public function setApi()
    {
        $this->api='https://oapi.dingtalk.com/robot/send?access_token='.$this->app->dingAccessToken;
    }

    public function setRobotType()
    {
        $this->robotType=Result::RobotTypeOfDing;
    }

    public function __construct(Container $app)
    {
        parent::__construct($app);
        $this->setRobotType();
        $this->setApi();
    }

    /**
     * @param DingEntityParams $params
     * @return $this
     */
    public function notice(DingEntityParams $params)
    {
        $this->app->params=$params->build();
        return $this;
    }

}