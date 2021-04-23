<?php

namespace DishCheng\RobotNotice\Core;

/**
 * Class ContainerBase
 * @package DishCheng\Ssbooking\Core
 */
class ContainerBase extends Container
{
    /**
     * @var array
     */
    protected $provider=[];

    /**
     * @var array
     */
    public $params=array();

    public $dingAccessToken='';
    public $QYWechatKey='';

    /**
     * @param string $dingAccessToken
     */
    public function setDingAccessToken(string $dingAccessToken): void
    {
        $this->dingAccessToken=$dingAccessToken;
    }

    /**
     * @param string $QYWechatKey
     */
    public function setQYWechatKey(string $QYWechatKey): void
    {
        $this->QYWechatKey=$QYWechatKey;
    }


    /**
     * ContainerBase constructor.
     * @param array $params
     */
    public function __construct($params=array())
    {
        if ($params) {
            foreach ($params as &$item) {
                if (is_array($item)||is_object($item)) {
                    $item=json_encode($item, JSON_UNESCAPED_UNICODE);
                }
            }
        }
        $provider_callback=function ($provider) {
            $obj=new $provider;
            $this->serviceRegister($obj);
        };
        array_walk($this->provider, $provider_callback);//注册
    }

    /**
     * @param $id
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }


}
