<?php

/**
 * ChromePhpAdapter 
 * 
 * @uses LoggerAdapterInterface
 * @package 
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */

namespace DebugLogger\Adapter;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use DebugLogger\Model\InstanceInterface;
use DebugLogger\Model\LoggerInterface;

class MonologAdapter implements InstanceInterface, LoggerInterface
{
    protected $instance;

    public function __construct($file)
    {
        $this->setInstance(new Logger($file));
        $this->getInstance()->pushHandler(new StreamHandler($file), Logger::WARNING);
    }

    /**
     * logMessage 
     * 
     * @param mixed $key 
     * @param mixed $data 
     * @access public
     * @return void
     */
    public function logMessage($key, $data = null)
    {
        $this->logType('info', $key, $data);
    }

    /**
     * logWarning 
     * 
     * @param mixed $key 
     * @param mixed $data 
     * @access public
     * @return void
     */
    public function logWarning($key, $data = null)
    {
        $this->logType('warning', $key, $data);
    }

    /**
     * logError 
     * 
     * @param mixed $key 
     * @param mixed $data 
     * @access public
     * @return void
     */
    public function logError($key, $data = null)
    {
        $this->logType('error', $key, $data);
    }

    /**
     * logType 
     * 
     * @param mixed $type 
     * @param mixed $key 
     * @param mixed $data 
     * @access protected
     * @return void
     */
    protected function logType($type, $key, $data = null)
    {
        if (!is_array($data)) {
            $data = array($data);
        }

        $targetMethod = sprintf('add%s', ucfirst(strtolower($type)));

        $this->getInstance()->$targetMethod($key, $data);
    }

    /**
     * getInstance 
     * 
     * @access public
     * @return void
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * setInstance 
     * 
     * @param ChromePhp $instance 
     * @access public
     * @return void
     */
    public function setInstance($instance)
    {
        $this->instance = $instance;
    }
}
