<?php

class UsuariosMapper
{

    public function salvar(Usuarios $usuario)
    {
        //Checa se é um update ou insert
        //Faz a chamada ao metodo especifico no Table Gateway 
    }
    
    public function buscarPorId($id)
    {
        //Chama o metodo de busca do Table Gateway
    }
    
    public function Listar()
    {
        //chama o metodo de listagem do Table Gateway
    }
    
    public function excluir($id)
    {
        //remove o registro
    }
}