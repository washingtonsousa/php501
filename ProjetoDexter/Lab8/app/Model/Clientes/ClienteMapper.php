<?php
namespace app\Model\Clientes;

use lib\Db\AbstractDataMapper;
use lib\Db\Conexao;
use lib\Db\TableGateway;
use lib\Db\AbstractEntity;
use app\Model\Clientes\Cliente;

class ClienteMapper extends AbstractDataMapper
{

    public function __construct(Conexao $conexao)
    {
        parent::__construct(new TableGateway($conexao, 'clientes'));
    }

    protected function converterParaObjeto(array $registro)
    {
        $cliente = new Cliente();
        $cliente->setId($registro['id']);
        $cliente->setCpfCnpj($registro['cpf_cnpj']);
        $cliente->setNomeRazao($registro['nome_razao']);
        $cliente->setTelefone($registro['telefone']);
        $cliente->setEmail($registro['email']);
        return $cliente;
    }

    protected function converterParaArray(AbstractEntity $entity)
    {
        return array(
            'nome_razao' => $entity->getNomeRazao(),
            'cpf_cnpj' => $entity->getCpfCnpj(),
            'email' => $entity->getEmail(),
            'telefone' => $entity->getTelefone()
        );
    }
}