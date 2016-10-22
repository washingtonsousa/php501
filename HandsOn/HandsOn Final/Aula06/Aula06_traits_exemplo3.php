<?php

trait Validacao
{
    public function validarCpfCnpj($cpfOrCnpj)
    {
        echo '<hr>Validando cpf/cnpj...<hr>';
    }
    
    public function validarCartaco($numeroCartao)
    {
        echo '<hr>Validando cartao...<hr>';
    }
}

trait Banco
{
    public function gravar($dados)
    {
        echo '<hr> Gravando dados no banco<hr>';
    }
    
    public function consultar($id)
    {
        echo '<hr> Buscando o registro....<hr>';
    }
}

class Vendas
{
    use Validacao, Banco;
    
    public function finalizar($dados)
    {
        $this->validarCartaco(1111111111);
        $this->validarCpfCnpj(55555555555);
        $this->gravar('dados');
    }
}

$vendas = new Vendas();
$vendas->finalizar('dados');