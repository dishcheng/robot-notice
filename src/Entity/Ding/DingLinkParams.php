<?php

namespace DishCheng\RobotNotice\Entity\Ding;


use DishCheng\RobotNotice\Entity\DingEntityParams;

class DingLinkParams extends DingEntityParams
{
    private $msgtype='link';


    private $title='';//标题
    private $text='';//消息内容。如果太长只会部分展示。
    private $messageUrl='';//点击消息跳转的URL。
    private $picUrl='';//选填，图片URL。


    public function __construct($title, $text, $messageUrl)
    {
        $this->title=$title;
        $this->text=$text;
        $this->messageUrl=$messageUrl;
    }

    /**
     * @param string $picUrl
     */
    public function setPicUrl(string $picUrl): void
    {
        $this->picUrl=$picUrl;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'link'=>[
                'title'=>$this->title,
                "text"=>$this->text,
                "messageUrl"=>$this->messageUrl,
                "picUrl"=>$this->picUrl,
            ]
        ];
    }
}