<?php
namespace lib\Db;

class Conexao
{

    private $conn;

    private $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        
        if (! $this->config) {
           global $config;
           $this->config = $config;
        }
    }

    public function get()
    {
        if (is_null($this->conn)) {
            $config = $this->config;
            $this->conn = new \PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass']);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        
        return $this->conn;
    }
}