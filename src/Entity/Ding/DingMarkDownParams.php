<?php

namespace DishCheng\RobotNotice\Entity\Ding;


use DishCheng\RobotNotice\Entity\DingEntityParams;

class DingMarkDownParams extends DingEntityParams
{
    private $msgtype='markdown';

    private $title='';//标题
    private $text='';//markdown格式的消息。


    private $isAtAll=false;


    private $atMobiles=[];

    private $atUserIds=[];


    public function __construct($title, $text)
    {
        $this->title=$title;
        $this->text=$text;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'markdown'=>[
                'title'=>$this->title,
                'text'=>$this->text,
            ],
            'at'=>[
                "atMobiles"=>$this->atMobiles,
                "atUserIds "=>$this->atUserIds,
                "isAtAll "=>$this->isAtAll
            ]
        ];
    }
}