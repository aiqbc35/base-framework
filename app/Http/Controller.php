<?php

namespace App\Http;

use Illuminate\Container\Container;
use Core\Traits\getInstance;

class Controller
{

    use getInstance;

    protected $logger;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->logger = $this->logInstance();
    }


    /**
     * 视图显示
     * @param $page 页面名称
     * @param null $data 传入数据
     * @return mixed
     */
    public function display($page,$data = null)
    {
        return $this->viewInstance()->make($page)->with($data);
    }

}