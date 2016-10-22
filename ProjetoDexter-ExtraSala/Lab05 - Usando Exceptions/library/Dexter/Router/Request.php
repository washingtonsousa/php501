<?php

namespace Dexter\Router;

/**
 * Encapsula dados da requisição
 */
class Request implements RequestInterface
{

    /**
     * Armazena URI
     */
    private $uri;

    /**
     * Armazena parâmetros da requisição
     */
    private $params;

    /**
     * Armazena método http
     */
    private $httpMethod;

    /**
     * Recupera URI
     * @return string
     */
    public function getUri()
    {
        if (!$this->uri) {
            $this->uri = '/' . ltrim(isset($_GET['q']) ? $_GET['q'] : 'index.html', '/');
        }
        return $this->uri;
    }

    /**
     * Recupera parâmetro passado
     * @param string $param
     * @param mixed $default = NULL
     * @return mixed
     */
    public function getParam($param, $default = null)
    {
        $this->doParseParams();
        if (isset($this->params[$param])) {
            return $this->params[$param];
        }
        return $default;
    }

    /**
     * Recupera todos os parâmetros da requisição
     * @return array
     */
    public function getParams()
    {
        $this->doParseParams();
        return $this->params;
    }

    /**
     * Faz o parse dos parâmetros da requisição
     */
    private function doParseParams()
    {
        if (!$this->params) {
            $this->httpMethod = $_SERVER['REQUEST_METHOD'];
            switch ($this->httpMethod) {
                case 'GET':
                    $this->params = $_GET;
                    break;
                case 'POST':
                    $this->params = $_POST;
                    break;
                default:
                    throw new \RuntimeException('Method HTTP not supported yet!');
                    break;
            }
        }
    }

    /**
     * Verifica se é POST
     * @return bool
     */
    public function isPost()
    {
        $this->doParseParams();
        return 'POST' === $this->httpMethod;
    }
}
