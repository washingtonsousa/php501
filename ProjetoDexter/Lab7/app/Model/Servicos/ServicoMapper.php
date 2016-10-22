<?php
namespace app\Model\Servicos;

use lib\Db\AbstractDataMapper;
use lib\Db\AbstractEntity;
use lib\Db\Conexao;
use lib\Db\TableGateway;

class ServicoMapper extends AbstractDataMapper
{

    public function __construct(Conexao $conexao)
    {
        parent::__construct(new TableGateway($conexao, 'servicos'));
    }

    public function obterTodosDaHome()
    {
        $todos = array();

        $registros = $this->tableGateway->listar(array('home' => true));
        foreach ($registros as $registro) {
            $objeto = $this->converterParaObjeto($registro);
            array_push($todos, $objeto);
        }

        return $todos;
    }

    public function obterTodosDoServicos()
    {
        $todos = array();

        $registros = $this->tableGateway->listar(array('home' => 'false'));
        foreach ($registros as $registro) {
            $objeto = $this->converterParaObjeto($registro);
            array_push($todos, $objeto);
        }

        return $todos;
    }

    protected function converterParaObjeto(array $registro)
    {
        $servico = new Servico();
        $servico->setId($registro['id']);
        $servico->setNome($registro['nome']);
        $servico->setDescricao($registro['descricao']);
        $servico->setUrlIcone($registro['url_icone']);
        $servico->setHome($registro['home']);

        return $servico;
    }

    protected function converterParaArray(AbstractEntity $entity)
    {
        return array(
            'nome' => $entity->getNome(),
            'descricao' => $entity->getDescricao(),
            'url_icone' => $entity->getUrlIcone(),
            'home' => $entity->getHome()
        );
    }
}