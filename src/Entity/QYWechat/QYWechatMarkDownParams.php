<?php

namespace DishCheng\RobotNotice\Entity\QYWechat;


use DishCheng\RobotNotice\Entity\QYWechatEntityParams;

class QYWechatMarkDownParams extends QYWechatEntityParams
{
    public $msgtype='markdown';

    private $content='';//文本内容


    public function __construct($content)
    {
        $this->content=$content;
    }

    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'markdown'=>[
                'content'=>$this->content,
            ],
        ];
    }
}