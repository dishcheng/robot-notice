<?php

namespace DishCheng\RobotNotice\Entity\Ding;


use DishCheng\RobotNotice\Entity\DingEntityParams;

/**
 * 独立跳转ActionCard类型
 * Class DingMultiActionCardParams
 * @package DishCheng\RobotNotice\Entity\Ding
 */
class DingMultiActionCardParams extends DingEntityParams
{
    private $msgtype='actionCard';

    private $title='';//标题
    private $text='';//markdown格式的消息。
    private $btnOrientation='0';//0：按钮竖直排列   1：按钮横向排列

    /**
     * [
     * {
     * "title": "内容不错",
     * "actionURL": "https://www.dingtalk.com/"
     * },
     * {
     * "title": "不感兴趣",
     * "actionURL": "https://www.dingtalk.com/"
     * }
     * ]
     * @var array
     */
    private $btns=[];//按钮


    public function __construct($title, $text,array $btns)
    {
        $this->title=$title;
        $this->text=$text;
        $this->btns=$btns;
    }


    /**
     * @param string $btnOrientation
     */
    public function setBtnOrientation(string $btnOrientation): void
    {
        $this->btnOrientation=$btnOrientation;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'actionCard'=>[
                'title'=>$this->title,
                'text'=>$this->text,
                'btnOrientation'=>$this->btnOrientation,
                'btns'=>$this->btns,
            ],
        ];
    }
}