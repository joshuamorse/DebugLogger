<?php

/**
 * Acts as a placeholder for logger instances.
 * This object should be injected into the main logger object at runtime.
 * 
 * @package DebugLogger
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */

namespace DebugLogger\Component;

use DebugLogger\Model\LoggerInterface;

class Container
{
    protected
        $loggers = array()
    ;

    /**
     * add 
     * 
     * @param mixed $name 
     * @param LoggerAdapter $loggerAdapter 
     * @access public
     * @return void
     */
    public function add($name, LoggerInterface $loggerAdapter)
    {
        $this->loggers[$name] = $loggerAdapter;
    }

    /**
     * getLoggers 
     * 
     * @access public
     * @return void
     */
    public function getLoggers()
    {
        return $this->loggers;
    }
}
