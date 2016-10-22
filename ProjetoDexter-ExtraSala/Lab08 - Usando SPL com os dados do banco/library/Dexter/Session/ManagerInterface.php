<?php

namespace Dexter\Session;

interface ManagerInterface
{

    /**
     * Recupera uma instância
     */
    public static function getInstance();

    /**
     * Inicia a sessão
     */
    public function start();

    /**
     * Verifica se já foi iniciada a sessão
     */
    public function hasStarted();
}
