<?php

class Funcionalidade extends AbstractEntity
{
    
    private $nome;

    private $descricao;

    private $urlIcone;

    /**
     *
     * @return the $nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     *
     * @return the $descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     *
     * @param field_type $nome            
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     *
     * @param field_type $descricao            
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     *
     * @return the $urlIcone
     */
    public function getUrlIcone()
    {
        return $this->urlIcone;
    }

    /**
     *
     * @param field_type $urlIcone            
     */
    public function setUrlIcone($urlIcone)
    {
        $this->urlIcone = $urlIcone;
    }
}
