<?php

namespace DishCheng\RobotNotice\Provider;

use DishCheng\RobotNotice\Core\Container;
use DishCheng\RobotNotice\interfaces\Provider;
use DishCheng\RobotNotice\Services\DingRobotService;

//use DishCheng\RobotNotice\Services\Hotel\Hotel;
//use DishCheng\RobotNotice\Services\Hotel\Order;


/**
 * Class HotelProvider
 * @package DishCheng\Ssbooking\Provider
 */
class DingRobotProvider implements Provider
{
    /**
     * @inheritDoc
     */
    public function serviceProvider(Container $container)
    {
        $container['ding']=function ($container) {
            return new DingRobotService($container);
        };

//        $container['hotelOrder']=function ($container) {
//            return new Order($container);
//        };
    }
}

