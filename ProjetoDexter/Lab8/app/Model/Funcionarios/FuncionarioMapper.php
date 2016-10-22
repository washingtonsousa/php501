<?php

namespace app\Model\Funcionarios;

use lib\Db\AbstractDataMapper;
use lib\Db\AbstractEntity;
use lib\Db\Conexao;
use lib\Db\TableGateway;

class FuncionarioMapper extends AbstractDataMapper
{
    public function __construct(Conexao $conexao)
    {
        parent::__construct(new TableGateway($conexao, 'funcionarios'));
    }

    protected function converterParaObjeto(array $registro)
    {
        $functionario = new Funcionario();
        $functionario->setId($registro['id']);
        $functionario->setNome($registro['nome']);
        $functionario->setEmail($registro['email']);
        $functionario->setSenha($registro['senha']);
        $functionario->setPrfId($registro['prf_id']);
        return $functionario;
    }

    protected function converterParaArray(AbstractEntity $entity)
    {
        return array(
            'nome' => $entity->getNome(),
            'email' => $entity->getEmail(),
            'senha' => $entity->getSenha(),
            'prf_id' => $entity->getPrfId(),
        );
    }
}