<?php
namespace lib\Db;

abstract class AbstractDataMapper
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function obterPorId($id)
    {
        $objeto = null;
        
        $registro = $this->tableGateway->buscarRegistro(array(
            'id' => $id
        ));
        
        if (! empty($registro)) {
            $objeto = $this->converterParaObjeto($registro);
        }
        
        return $objeto;
    }

    public function buscarUmRegistro(array $condicao)
    {
        $objeto = null;
        
        $registro = $this->tableGateway->buscarRegistro($condicao);
        
        if (! empty($registro)) {
            $objeto = $this->converterParaObjeto($registro);
        }
        
        return $objeto;
    }

    public function obterTodos()
    {
        $todos = array();
        
        $registros = $this->tableGateway->listar();
        foreach ($registros as $registro) {
            $objeto = $this->converterParaObjeto($registro);
            array_push($todos, $objeto);
        }
        
        return $todos;
    }

    public function inserir(AbstractEntity $entity)
    {
        $linhasAfetadas = 0;
        if ($entity && $entity->isNew()) {
            $linhasAfetadas = $this->tableGateway->inserir($this->converterParaArray($entity));
        }
        
        return $linhasAfetadas;
    }

    public function alterar(AbstractEntity $entity)
    {
        $linhasAfetadas = 0;
        if ($entity && ! $entity->isNew()) {
            $linhasAfetadas = $this->tableGateway->alterar($entity->getId(), $this->converterParaArray($entity));
        }
        
        return $linhasAfetadas;
    }

    public function remover(AbstractEntity $entity)
    {
        $linhasAfetadas = 0;
        if ($entity && ! $entity->isNew()) {
            $linhasAfetadas = $this->tableGateway->excluir($entity->getId());
        }
        
        return $linhasAfetadas;
    }

    protected abstract function converterParaObjeto(array $registro);

    protected abstract function converterParaArray(AbstractEntity $entity);
}