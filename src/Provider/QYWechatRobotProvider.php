<?php

namespace DishCheng\RobotNotice\Provider;

use DishCheng\RobotNotice\Core\Container;
use DishCheng\RobotNotice\interfaces\Provider;
use DishCheng\RobotNotice\Services\QYWechatRobotService;

//use DishCheng\RobotNotice\Services\Hotel\Hotel;
//use DishCheng\RobotNotice\Services\Hotel\Order;


/**
 * Class HotelProvider
 * @package DishCheng\Ssbooking\Provider
 */
class QYWechatRobotProvider implements Provider
{
    /**
     * @inheritDoc
     */
    public function serviceProvider(Container $container)
    {
        $container['QYWechat']=function ($container) {
            return new QYWechatRobotService($container);
        };
    }
}

