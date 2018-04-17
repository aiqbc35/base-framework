<?php

namespace Core\interfaces;

interface Logger
{
    /**
     * 系统无法使用.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function emergency($message, array $context = array());

    /**
     * 非常紧急，必须马上处理.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function alert($message, array $context = array());

    /**
     * 严重错误.
     *
     * Example: 应用程序组件不可用，出现错误.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function critical($message, array $context = array());

    /**
     * 运行时错误，但是不需要立刻处理
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function error($message, array $context = array());

    /**
     * 出现非错误的异常
     *
     * 使用弃用的API，糟糕的API使用，不期望的事情不一定是错误的
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function warning($message, array $context = array());

    /**
     * 普通但是重要的事件
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function notice($message, array $context = array());

    /**
     *  关键事件
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function info($message, array $context = array());

    /**
     * 详细的调试信息
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function debug($message, array $context = array());

    /**
     * 任意级别记录日志
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array());
}