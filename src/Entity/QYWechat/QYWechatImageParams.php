<?php

namespace DishCheng\RobotNotice\Entity\QYWechat;


use DishCheng\RobotNotice\Entity\QYWechatEntityParams;

/**
 * 注：图片（base64编码前）最大不能超过2M，支持JPG,PNG格式
 * Class QYWechatImageParams
 * @package DishCheng\RobotNotice\Entity\QYWechat
 */
class QYWechatImageParams extends QYWechatEntityParams
{
    public $msgtype='image';


    public $base64;
    public $md5;

    public function __construct($base64, $md5)
    {
        $this->base64=$base64;
        $this->md5=$md5;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'image'=>[
                'base64'=>$this->base64,
                'md5'=>$this->md5
            ],
        ];
    }
}