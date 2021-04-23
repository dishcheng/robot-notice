<?php

namespace DishCheng\RobotNotice\Entity\Ding;


use DishCheng\RobotNotice\Entity\DingEntityParams;

class DingTextParams extends DingEntityParams
{
    public $msgtype='text';

    private $content='';//文本内容


    private $isAtAll=false;


    private $atMobiles=[];

    private $atUserIds=[];


    public function __construct($content)
    {
        $this->content=$content;
    }

    /**
     * @param bool $isAtAll
     */
    public function setIsAtAll(bool $isAtAll): void
    {
        $this->isAtAll=$isAtAll;
    }

    /**
     * @param array $atMobiles
     */
    public function setAtMobiles(array $atMobiles): void
    {
        $this->atMobiles=$atMobiles;
    }

    /**
     * @param array $atUserIds
     */
    public function setAtUserIds(array $atUserIds): void
    {
        $this->atUserIds=$atUserIds;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'text'=>[
                'content'=>$this->content
            ],
            'at'=>[
                "atMobiles"=>$this->atMobiles,
                "atUserIds "=>$this->atUserIds,
                "isAtAll "=>$this->isAtAll
            ]
        ];
    }
}