<?php

namespace DishCheng\RobotNotice\Entity\Ding;


use DishCheng\RobotNotice\Entity\DingEntityParams;

/**
 * 整体跳转ActionCard类型
 * Class DingSingleActionCardParams
 * @package DishCheng\RobotNotice\Entity\Ding
 */
class DingSingleActionCardParams extends DingEntityParams
{
    private $msgtype='actionCard';

    private $title='';//标题
    private $text='';//markdown格式的消息。
    private $singleTitle='';//单个按钮的标题。
    private $singleUrl='';//点击singleTitle按钮触发的URL。


    private $btnOrientation='0';//0：按钮竖直排列   1：按钮横向排列


    public function __construct($title, $text, $singleTitle, $singleUrl)
    {
        $this->title=$title;
        $this->text=$text;
        $this->singleTitle=$singleTitle;
        $this->singleUrl=$singleUrl;
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
                'singleTitle'=>$this->singleTitle,
                'singleURL'=>$this->singleUrl,
                'btnOrientation'=>$this->btnOrientation,
            ],
        ];
    }
}