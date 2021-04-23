<?php

namespace DishCheng\RobotNotice;

use DishCheng\RobotNotice\Core\ContainerBase;
use DishCheng\RobotNotice\Provider\DingRobotProvider;
use DishCheng\RobotNotice\Provider\QYWechatRobotProvider;
use DishCheng\RobotNotice\Services\DingRobotService;
use DishCheng\RobotNotice\Services\QYWechatRobotService;

/**
 * @property DingRobotService ding
 * @property QYWechatRobotService QYWechat
 * Class SSBookHotelService
 * @package DishCheng\Ssbooking\Services
 */
class RobotNotice extends ContainerBase
{
    public function __construct($params=[])
    {
        parent::__construct($params);
    }

    /**
     * 服务提供者
     * @var array
     */
    protected $provider=[
        DingRobotProvider::class,
        QYWechatRobotProvider::class
    ];
}
