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

    public function validarDados($dados)
    {
        echo '<hr> Validando os dados.... Metodo do Trait Validacao<hr>';
    }
    
    public abstract function metodoAbstrato($parametro);
}

trait Banco
{
    public $nomeBanco = 'contas';
    
    public function gravar($dados)
    {
        echo '<hr> Gravando dados no banco<hr>';
    }

    public function consultar($id)
    {
        echo '<hr> Buscando o registro....<hr>';
    }

    public function validarDados($dados)
    {
        echo '<hr> Validando os dados.... Metodo do Trait Banco<hr>';
    }
}

trait TodosOsTraits
{
    use Validacao, Banco{
        Banco::validarDados insteadof Validacao;
    }
    
    public function metodoAbstrato($parametro)
    {
        echo '<hr> Metodo Implementado <hr>';
    }
}

class Vendas
{
   use TodosOsTraits;

    public function finalizar($dados)
    {
        $this->validarCartaco(1111111111);
        $this->validarCpfCnpj(55555555555);
        $this->validarDados('Dados');
        $this->gravar('dados');
    }
    
    public function getNomeBanco()
    {
        return $this->nomeBanco;
    }
}

$vendas = new Vendas();
$vendas->finalizar('dados');
echo '<hr>';
echo 'Nome do Banco: ' . $vendas->getNomeBanco();