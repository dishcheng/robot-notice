<?php

namespace DishCheng\RobotNotice\Entity\Ding;


use DishCheng\RobotNotice\Entity\DingEntityParams;

class DingFeedCardParams extends DingEntityParams
{
    public $msgtype='feedCard';

    /**
     * [
     * {
     * "title": "时代的火车向前开1",
     * "messageURL": "https://www.dingtalk.com/",
     * "picURL": "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
     * },
     * {
     * "title": "时代的火车向前开2",
     * "messageURL": "https://www.dingtalk.com/",
     * "picURL": "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
     * }
     * ]
     * @var array
     */
    private $links=[];//


    /**
     * DingFeedCardParams constructor.
     * @param array $links
     */
    public function __construct(array $links)
    {
        $this->links=$links;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'feedCard'=>[
                'links'=>$this->links
            ],
        ];
    }
}