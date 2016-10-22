<?php

namespace DexterApp\Admin\Models\Entity;

use DexterApp\Front\Models\AbstractEntity;

class Destaque extends AbstractEntity
{
    private $destaqueId;
    private $imagem;
    private $titulo;
    private $descricao;

    public function getId()
    {
        return $this->destaqueId;
    }

    public function setId($destaqueId)
    {
        if (!is_int($destaqueId)) {
            // [Lab05] Usando Exceptions
        }

        $this->destaqueId = $destaqueId;
        return $this;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        if (!preg_match("@\.(jpg|png|gif|jpeg)$@", $imagem)) {
            // [Lab05] Usando Exceptions
        }

        $this->imagem = $imagem;
        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        if (strlen($titulo) > 50) {
            // [Lab05] Usando Exceptions
        }

        $this->titulo = $titulo;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }
}
