<?php

namespace Dexter\Session;

class Manager implements ManagerInterface
{

    use \Dexter\Singleton;

    /**
     * Se já está iniciada a sessão ou não
     * @var bool
     */
    private $started = false;

    /**
     * Inicia a sessão
     */
    public function start()
    {
        if (!$this->started) {
            session_start();
            $this->started = true;
        }
    }

    /**
     * Getter for "started"
     */
    public function hasStarted()
    {
        return $this->started;
    }
}
