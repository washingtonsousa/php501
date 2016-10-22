<?php

namespace Dexter;

/**
 * Trait singleton para ser utilizada
 * por todas as classes que são singleton
 */
trait Singleton
{
    // [Lab06] Trabalhando com Singleton e Métodos Mágicos

    public static function getInstance()
    {
       // [Lab06] Trabalhando com Singleton e Métodos Mágicos

        return new static();
    }

    // [Lab06] Trabalhando com Singleton e Métodos Mágicos
}
