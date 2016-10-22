<?php

namespace app\Model\FaleConosco;

use lib\Db\AbstractDataMapper;
use lib\Db\AbstractEntity;
use lib\Db\Conexao;
use lib\Db\TableGateway;

class FaleConoscoMapper extends AbstractDataMapper
{
    public function __construct(Conexao $conexao)
    {
        parent::__construct(new TableGateway($conexao, 'fale_conosco'));
    }

    protected function converterParaObjeto(array $registro)
    {
        $faleConosco = new FaleConosco();
        $faleConosco->setId($registro['id']);
        $faleConosco->setNome($registro['nome']);
        $faleConosco->setAssunto($registro['assunto']);
        $faleConosco->setMensagem($registro['mensagem']);
        $faleConosco->setEmail($registro['email']);
        return $faleConosco;
    }

    protected function converterParaArray(AbstractEntity $entity)
    {
        return array(
            'nome' => $entity->getNome(),
            'assunto' => $entity->getAssunto(),
            'mensagem' => $entity->getMensagem(),
            'email' => $entity->getEmail(),
        );
    }
}