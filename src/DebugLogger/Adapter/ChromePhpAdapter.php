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

use DebugLogger\Model\InstanceInterface;
use DebugLogger\Model\LoggerInterface;

class ChromePhpAdapter implements InstanceInterface, LoggerInterface
{
    protected $instance;

    public function __construct()
    {
        $this->setInstance(\ChromePhp::getInstance());
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
        if ($data) {
            $this->getInstance()->log($key, $data);
        } else {
            $this->getInstance()->log($key);
        }
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
        $this->getInstance()->warn($key);

        if ($data) {
            $this->getInstance()->warn($key, $data);
        }
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
        $this->getInstance()->error($key);

        if ($data) {
            $this->getInstance()->error($key, $data);
        }
    }
}
