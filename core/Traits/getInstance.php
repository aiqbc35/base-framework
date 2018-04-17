<?php

namespace Core\Traits;

use Illuminate\Container\Container;

trait getInstance
{


    /**
     * 日志接口
     * @return mixed
     */
    private function logInstance()
    {
        $app = $this->get();
        return $app->make('Logger');
    }

    /**
     * 视图接口
     * @return mixed
     */
    private function viewInstance()
    {
        $app = $this->get();
        return $app->make('view');
    }

    /**
     * 获取接口
     * @return OBJECT
     */
    private function get()
    {
        return Container::getInstance();
    }
}