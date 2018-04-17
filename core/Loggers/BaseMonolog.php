<?php
namespace Core\Loggers;

//use Core\interfaces\Logger as BaseLogInterfaces;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class BaseMonolog
{

    private $logType = array(
        'DEBUG' => 'Logger::DEBUG',
        'INFO'  => 'Logger::INFO',
        'NOTICE'  => 'Logger::NOTICE',
        'WARNING'  => 'Logger::WARNING',
        'ERROR'  => 'Logger::ERROR',
        'CRITICAL'  => 'Logger::CRITICAL',
        'ALERT'  => 'Logger::ALERT',
        'EMERGENCY'  => 'Logger::EMERGENCY',
    );


    private $logger;

    public function __construct($objecg = 'my_logger')
    {
        $logger = new Logger($objecg);
        $this->logger = $logger;
    }

    private function getLogFilePath()
    {
        $path = STORAGE_PATH . 'log' . DIRECTORY_SEPARATOR;
        $file = $path . date('Y-m') . DIRECTORY_SEPARATOR . date('d') . '_log.log';
        return $file;
    }

    private function pushHandler($level)
    {
        $this->logger->pushHandler(new StreamHandler($this->getLogFilePath(), $level));
        $this->logger->pushHandler(new FirePHPHandler());
        return $this->logger;
    }

    public function info($message,array $context = array())
   {
       $this->pushHandler($this->logType['INFO']);
       $this->logger->info($message,$context);
   }

   public function debug($message, array $context = array())
   {
       $this->pushHandler($this->logType['DEBUG']);
       $this->logger->debug($message,$context);
   }

   public function log($level, $message, array $context = array())
   {
       $keyStr = strtoupper($level);

       $key = array_key_exists($keyStr,$this->logType);
       if ($key === false) {
            return false;
       }

       $this->pushHandler($this->logType['INFO']);
       $this->logger->debug($message,$context);
   }

   public function notice($message, array $context = array())
   {
       $this->pushHandler($this->logType['NOTICE']);
       $this->logger->debug($message,$context);
   }

   public function warning($message, array $context = array())
   {
       $this->pushHandler($this->logType['WARNING']);
       $this->logger->debug($message,$context);
   }

   public function error($message, array $context = array())
   {
       $this->pushHandler($this->logType['ERROR']);
       $this->logger->debug($message,$context);
   }

   public function critical($message, array $context = array())
   {
       $this->pushHandler($this->logType['CRITICAL']);
       $this->logger->debug($message,$context);
   }

   public function alert($message, array $context = array())
   {
       $this->pushHandler($this->logType['ALERT']);
       $this->logger->debug($message,$context);
   }
   public function emergency($message, array $context = array())
   {
       $this->pushHandler($this->logType['EMERGENCY']);
       $this->logger->debug($message,$context);
   }

}