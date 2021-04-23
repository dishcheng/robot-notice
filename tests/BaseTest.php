<?php

namespace Test\RobotNotice;

use DishCheng\RobotNotice\Entity\Ding\DingFeedCardParams;
use DishCheng\RobotNotice\Entity\Ding\DingLinkParams;
use DishCheng\RobotNotice\Entity\Ding\DingMarkDownParams;
use DishCheng\RobotNotice\Entity\Ding\DingMultiActionCardParams;
use DishCheng\RobotNotice\Entity\Ding\DingSingleActionCardParams;
use DishCheng\RobotNotice\Entity\Ding\DingTextParams;
use DishCheng\RobotNotice\Entity\QYWechat\QYWechatMarkDownParams;
use DishCheng\RobotNotice\RobotNotice;
use PHPUnit\Framework\TestCase;


/**
 * Class BaseTest
 * @package Test\RobotNotice
 */
class BaseTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }


    public function testQYWechat()
    {
        $client=new RobotNotice();

        $client->setQYWechatKey('xxxxxxxxxxxxx');


//        $res=$client->wechat->notice(new QYWechatTextParams('Test'))->postRequest();
//        $res=$client->wechat->notice(new QYWechatNewsParams(
//            [[
//                "title"=>"中秋节礼品领取",
//                "description"=>"今年中秋节公司有豪礼相送",
//                "url"=>"www.qq.com",
//                "picurl"=>"http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png"
//            ],
//                [
//                    "title"=>"中秋节礼品领取",
//                    "description"=>"今年中秋节公司有豪礼相送",
//                    "url"=>"www.baidu.com",
//                    "picurl"=>"http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png"
//                ]
//            ]
//        ))->postRequest();
        $res=$client->QYWechat->notice(new QYWechatMarkDownParams('实时新增用户反馈<font color=\"warning\">132例</font>，请相关同事注意。\n
         >类型:<font color=\"comment\">用户反馈</font>
         >普通用户反馈:<font color=\"comment\">117例</font>
         >VIP用户反馈:<font color=\"comment\">15例</font>'))->postRequest();
        dd($res);
    }

    public function testDingNotice()
    {
        $client=new RobotNotice();

        $client->setDingAccessToken('xxxxxxxxxxxxxxxxxxxxx');


        $res=$client->ding->notice(new DingLinkParams('sss', 'aaa', 'https://www.baidu.com'))->postRequest();
        $res=$client->ding->notice(new DingTextParams('sss'))->postRequest();
        $res=$client->ding->notice(new DingFeedCardParams([
            [
                "title"=>"时代的火车向前开1",
                "messageURL"=>"https://www.dingtalk.com/",
                "picURL"=>"https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png",
            ],
            [
                "title"=>"时代的火车向前开2",
                "messageURL"=>"https://www.dingtalk.com/",
                "picURL"=>"https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png",
            ]
        ]))->postRequest();
//
        $res=$client->ding->notice(new DingSingleActionCardParams('title', 'text', 'singleTitle', 'singleUrl'))->postRequest();
        $res=$client->ding->notice(new DingMultiActionCardParams('title', 'text', [
            [
                "title"=>"内容不错",
                "actionURL"=>"https://www.dingtalk.com/"
            ],
            [
                "title"=>"都是渣渣",
                "actionURL"=>"https://www.dingtalk.com/"
            ]
        ]))->postRequest();
        $res=$client->ding->notice(new DingMarkDownParams('杭州天气markdown', '#### 杭州天气 ![](http://name.com/pic.jpg)'))->postRequest();
        dd($res);
    }
}