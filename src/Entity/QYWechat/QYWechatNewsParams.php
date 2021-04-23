<?php

namespace DishCheng\RobotNotice\Entity\QYWechat;


use DishCheng\RobotNotice\Entity\QYWechatEntityParams;

class QYWechatNewsParams extends QYWechatEntityParams
{
    public $msgtype='news';

    /**
     * [
     * [
     * "title" => "中秋节礼品领取",
     * "description" => "今年中秋节公司有豪礼相送",
     * "url" => "www.qq.com",
     * "picurl" => "http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png"
     * ],
     * [
     * "title" => "中秋节礼品领取",
     * "description" => "今年中秋节公司有豪礼相送",
     * "url" => "www.qq.com",
     * "picurl" => "http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png"
     * ]
     * ]
     * @var array
     */
    private $articles=[];//


    public function __construct(array $articles)
    {
        $this->articles=$articles;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'news'=>[
                'articles'=>$this->articles,
            ],
        ];
    }
}