<?php

class Hooks
{
    private $hooks;

    public function __construct()
    {
        $this->hooks = array();
    }

    public function add($where, $callback, $priority = 50)
    {
        if (!isset($this->hooks[$where])) {
            $this->hooks[$where] = array();
        }

        $this->hooks[$where][$callback] = $priority;
    }

    public function remove($where, $callback)
    {
        if (isset($this->hooks[$where][$callback])) {
            unset($this->hooks[$where][$callback]);
        }

    }

    public function execute($where, $args = array())
    {
        if (isset($this->hooks[$where]) && is_array($this->hooks[$where])) {
            arsort($this->hooks[$where]);
            foreach ($this->hooks[$where] as $callback => $priority) {
                call_user_func_array($callback, $args);
            }
        }
    }
};