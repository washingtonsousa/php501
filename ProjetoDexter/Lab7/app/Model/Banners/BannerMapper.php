<?php

namespace app\Model\Banners;

use lib\Db\AbstractDataMapper;
use lib\Db\AbstractEntity;
use lib\Db\Conexao;
use lib\Db\TableGateway;

class BannerMapper extends AbstractDataMapper
{
    public function __construct(Conexao $conexao)
    {
        parent::__construct(new TableGateway($conexao, 'banners'));
    }

    protected function converterParaObjeto(array $registro)
    {
        $banner = new Banner();
        $banner->setId($registro['id']);
        $banner->setNome($registro['nome']);
        $banner->setDescricao($registro['descricao']);
        $banner->setUrl($registro['url']);
        return $banner;
    }

    protected function converterParaArray(AbstractEntity $entity)
    {
        return array(
            'nome' => $entity->getNome(),
            'descricao' => $entity->getDescricao(),
            'url' => $entity->getUrl(),
        );
    }
}