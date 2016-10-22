<?php
namespace Controller;

use Model\UsuariosMapper;
use Model\EntidadeUsuarios;

class Usuarios
{

    private $mapper;

    private $entidadeUsuario;

    public function __construct()
    {
        $this->mapper = new UsuariosMapper();
        $this->entidadeUsuario = new EntidadeUsuarios();
    }

    public function index()
    {
        $registros = $this->mapper->Listar();
        
        return $registros;
    }

    public function exibir($id)
    {
        $registro = $this->mapper->buscarPorId($id);
        return $registro;
    }

    public function cadastrar()
    {
        if ($_POST) {
            $this->entidadeUsuario->setNome($_POST['nome']);
            $this->entidadeUsuario->setEmail($_POST['email']);
            $this->entidadeUsuario->setSenha($_POST['senha']);
            
            if ($this->mapper->salvar($this->entidadeUsuario)) {
                header('location:?rota=usuarios');
            }
        }
    }

    public function excluir($id)
    {
        if ($this->mapper->excluir($id)) {
            header('location:?rota=usuarios');
        }
    }

    public function alterar($id)
    {
        if ($_POST) {
            
            $this->entidadeUsuario->setNome($_POST['nome']);
            $this->entidadeUsuario->setEmail($_POST['email']);
            
            if($_POST['senha'] != '123456'){
                $this->entidadeUsuario->setSenha($_POST['senha']);
            }
            
            $this->entidadeUsuario->setId($id);
            
            if ($this->mapper->salvar($this->entidadeUsuario)) {
                header('location:?rota=usuarios');
            }
        }
        
        return $this->mapper->buscarPorId($id);
    }
}