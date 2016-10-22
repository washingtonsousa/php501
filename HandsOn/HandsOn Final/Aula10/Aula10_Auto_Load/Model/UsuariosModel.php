<?php

namespace Model;

use Lib\Banco;
use Entities\UsuariosEntity;

class UsuariosModel
{
    private $banco;
    private $usuarioEntity;
    
    public function __construct(Banco $banco, UsuariosEntity $usuario)
    {
        echo '<hr>Classe Usuarios Model<hr>';
        $this->banco = $banco;
        $this->usuarioEntity = $usuario;
    }
}