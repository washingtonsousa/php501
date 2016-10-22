<?php
namespace app\Model\Funcionalidades;

use lib\Db\AbstractDataMapper;
use lib\Db\AbstractEntity;
use lib\Db\Conexao;
use lib\Db\TableGateway;

class FuncionalidadeMapper extends AbstractDataMapper
{

    public function __construct(Conexao $conexao)
    {
        parent::__construct(new TableGateway($conexao, 'funcionalidades'));
    }

    protected function converterParaObjeto(array $registro)
    {
        $funcionalidade = new Funcionalidade();
        $funcionalidade->setId($registro['id']);
        $funcionalidade->setNome($registro['nome']);
        $funcionalidade->setDescricao($registro['descricao']);
        $funcionalidade->setUrlIcone($registro['url_icone']);
        
        return $funcionalidade;
    }

    protected function converterParaArray(AbstractEntity $entity)
    {
        return array(
            'nome' => $entity->getNome(),
            'descricao' => $entity->getDescricao(),
            'url_icone' => $entity->getUrlIcone()
        );
    }
}