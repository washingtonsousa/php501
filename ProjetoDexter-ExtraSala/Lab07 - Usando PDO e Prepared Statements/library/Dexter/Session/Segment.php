<?php

namespace Dexter\Session;

class Segment
{

    /**
     * Nome do segmento
     * @var string
     */
    private $name;

    /**
     * Quem gerencia esse segmento
     * @var ManagerInterface
     */
    private $manager;

    /**
     * Armazena uma referência para os dados dentro da sessão
     */
    private $data;

    /**
     * Inicia o segmento
     */
    public function __construct(ManagerInterface $manager, $name)
    {
        $this->manager  = $manager;
        $this->name     = $name;
    }

    /**
     * Garante início da sessão e do segmento com o manager
     */
    private function start()
    {
        if (!$this->manager->hasStarted()) {
            $this->manager->start();
        }
        if (!isset($_SESSION[$this->name])) {
            $_SESSION[$this->name] = array();
        }
        $this->data = &$_SESSION[$this->name]; // referência!
    }

    /**
     * Recupera um valor da sessão
     */
    public function &__get($name)
    {
        $this->start();
        return $this->data[$name];
    }

    /**
     * Coloca um valor na sessão
     */
    public function __set($name, $value)
    {
        $this->start();
        $this->data[$name] = $value;
    }

    /**
     * Checa se valor existe na sessão
     */
    public function __isset($name)
    {
        $this->start();
        return isset($this->data[$name]);
    }

    /**
     * Retira um valor da sessão
     */
    public function __unset($name)
    {
        $this->start();
        unset($this->data[$name]);
    }

    /**
     * Limpa dados da sessão
     */
    public function clear()
    {
        $this->start();
        $this->data = array();
    }
}
