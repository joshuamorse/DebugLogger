<?php

/**
 * Defines requirements for interfacing with logger instances.
 * 
 * @package DebugLogger
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */

namespace DebugLogger\Model;

interface InstanceInterface
{
    /**
     * getInstance 
     * 
     * @access public
     * @return void
     */
    public function getInstance();

    /**
     * setInstance 
     * 
     * @access public
     * @return void
     */
    public function setInstance($instance);
}
