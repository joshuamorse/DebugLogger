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

class FirePhpAdapter implements LoggerInterface
{
    protected $instance;

    /**
     * __construct 
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
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
            \fb::log($key, $data);
        } else {
            \fb::log($key);
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
        \fb::warn($key);

        if ($data) {
            \fb::warn($key, $data);
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
        \fb::error($key);

        if ($data) {
            \fb::error($key, $data);
        }
    }
}
