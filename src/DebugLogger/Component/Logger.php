<?php

/**
 * The primary logger object.
 * Can call various log methods as defined in LoggerInterface.
 * Calls methods on all loggers in supplied Container object.
 * 
 * @uses LoggerInterface
 * @package DebugLogger
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */

namespace DebugLogger\Component;

use DebugLogger\Component\Container;
use DebugLogger\Model\LoggerInterface;

class Logger implements LoggerInterface
{
    protected
        /** Represents the container for various logger intances. */
        $container
    ;

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
        $this->logType('message', $key, $data);
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
     * @access public
     * @return void
     */
    protected function logType($type, $key, $data = null)
    {
        $targetMethod = sprintf('log%s', ucfirst(strtolower($type)));

        foreach ($this->getContainer()->getLoggers() as $name => $logger) {
            $logger->$targetMethod($key, $data);
        }
    }

    /**
     * setContainer 
     * 
     * @param Container $container 
     * @access public
     * @return void
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * getContainer 
     * 
     * @access public
     * @return void
     */
    public function getContainer()
    {
        return $this->container;
    }
}
