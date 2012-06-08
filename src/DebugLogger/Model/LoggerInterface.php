<?php

/**
 * Defines requirements for calling logger methods.
 * 
 * @package DebugLogger
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */

namespace DebugLogger\Model;

interface LoggerInterface
{
    /**
     * logMessage 
     * 
     * @param mixed $key 
     * @param mixed $value 
     * @access public
     * @return void
     */
    public function logMessage($key, $data = null);

    /**
     * logWarning 
     * 
     * @param mixed $key 
     * @param mixed $value 
     * @access public
     * @return void
     */
    public function logWarning($key, $data = null);

    /**
     * logError 
     * 
     * @param mixed $key 
     * @param mixed $value 
     * @access public
     * @return void
     */
    public function logError($key, $data = null);
}
