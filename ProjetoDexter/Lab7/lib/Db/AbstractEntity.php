<?php

namespace lib\Db;

abstract class AbstractEntity implements InterfaceIdentity
{

    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function isNew()
    {
        return is_null($this->id);
    }

    public function __toString()
    {
        $identity = ! $this->isNew() ? $this->getId() : '#';
        $entidade = get_class($this);
        return "$entidade::{$identity}";
    }
}