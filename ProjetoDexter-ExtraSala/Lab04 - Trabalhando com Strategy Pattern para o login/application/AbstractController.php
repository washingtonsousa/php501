<?php

namespace DexterApp;

/**
 * Classe base para todos os controllers
 */
abstract class AbstractController
{

    /**
     * Construtor genérico para todos os controllers
     * Não pode ser sobrescrito!
     */
    final public function __construct()
    {
        method_exists($this, 'init') && $this->init();
    }
}
