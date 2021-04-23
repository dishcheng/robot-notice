<?php

namespace DishCheng\RobotNotice\Services;


use DishCheng\RobotNotice\Core\BaseClient;
use DishCheng\RobotNotice\Core\Container;
use DishCheng\RobotNotice\Core\Result;
use DishCheng\RobotNotice\Entity\QYWechatEntityParams;

class QYWechatRobotService extends BaseClient
{
    public function setRobotType()
    {
        $this->robotType=Result::RobotTypeOfWechat;
    }

    public function setApi()
    {
        $this->api='https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key='.$this->app->QYWechatKey;
    }


    public function __construct(Container $app)
    {
        parent::__construct($app);
        $this->setRobotType();
        $this->setApi();
    }


    public function notice(QYWechatEntityParams $params)
    {
        $this->app->params=$params->build();
        return $this;
    }
}