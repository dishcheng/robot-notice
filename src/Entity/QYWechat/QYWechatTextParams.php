<?php

namespace DishCheng\RobotNotice\Entity\QYWechat;


use DishCheng\RobotNotice\Entity\QYWechatEntityParams;

class QYWechatTextParams extends QYWechatEntityParams
{
    public $msgtype='text';

    private $content='';//文本内容


    private $mentionedList=[];

    private $mentionedMobilList=[];


    public function __construct($content)
    {
        $this->content=$content;
    }

    /**
     * @param array $mentionedList
     */
    public function setMentionedList(array $mentionedList): void
    {
        $this->mentionedList=$mentionedList;
    }

    /**
     * @param array $mentionedMobilList
     */
    public function setMentionedMobilList(array $mentionedMobilList): void
    {
        $this->mentionedMobilList=$mentionedMobilList;
    }


    public function build()
    {
        return [
            'msgtype'=>$this->msgtype,
            'text'=>[
                'content'=>$this->content,
                'mentioned_list'=>$this->mentionedList,
                'mentioned_mobile_list'=>$this->mentionedMobilList,
            ],
        ];
    }
}