<?php
use app\Model\Clientes\ClienteMapper;
use app\Model\Clientes\Cliente;

/**
 * Laboratório 6 Task4
 */
class ClienteMapperTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileAbstractMapper()
    {
        require_once 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        require_once 'lib/Db/TableGateway.php';
        require_once 'lib/Db/AbstractDataMapper.php';
        require_once 'lib/Db/InterfaceIdentity.php';
        require_once 'lib/Db/AbstractEntity.php';
        
        $existe = false;
        
        $pathArquivo = 'app/Model/Clientes/ClienteMapper.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    /**
     * @depends testExisteFileAbstractMapper
     */
    public function testChecaTestExisteMetodoConstrutor($pathArquivo)
    {
        require_once $pathArquivo;
        
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\AbstractDataMapper::__construct');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExisteMetodoConverterParaObjeto()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('app\Model\Clientes\ClienteMapper::converterParaObjeto');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExisteMetodoConverterParaArray()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('app\Model\Clientes\ClienteMapper::converterParaArray');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testConsegueInserirRegistro()
    {
        require 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        require_once 'app/Model/Clientes/Cliente.php';
        $conexao = new lib\Db\Conexao($config);
        $clienteMapper = new ClienteMapper($conexao);
        
        $cliente = new Cliente();
        $cliente->setNomeRazao('Cliente Teste mapper');
        $cliente->setCpfCnpj('292.508.638-78');
        $cliente->setEmail('cliente.mapper@gmail.com');
        $cliente->setTelefone('4044-7882');
        
        $retorno = $clienteMapper->inserir($cliente);
        
        $this->assertTrue($retorno);
        
        return $cliente->getEmail();
    }

    /**
     * @depends testConsegueInserirRegistro
     *
     * @return string
     */
    public function testConsegueBuscarRegistro($email)
    {
        require 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        $conexao = new lib\Db\Conexao($config);
        $clienteMapper = new ClienteMapper($conexao);
        
        $cliente = $clienteMapper->buscarUmRegistro([
            'email' => $email
        ]);

        $this->assertSame('Cliente Teste mapper', $cliente->getNomeRazao());
        
        return $cliente->getId();
    }

    /**
     * @depends testConsegueBuscarRegistro
     *
     * @param int $id            
     */
    public function testConsegueAlterarRegistro($id)
    {
        require 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        
        $conexao = new lib\Db\Conexao($config);
        $clienteMapper = new ClienteMapper($conexao);
        
        $cliente = new Cliente();
        $cliente->setId($id);
        $cliente->setNomeRazao('Cliente Teste Alterado');
        $cliente->setCpfCnpj('292.508.638-78');
        $cliente->setEmail('cliente.mapper@gmail.com');
        $cliente->setTelefone('4044-7882');
        
        $clienteMapper->alterar($cliente);
        
        $clienteAlterado = $clienteMapper->obterPorId($id);
        
        $this->assertSame('Cliente Teste Alterado', $clienteAlterado->getNomeRazao());
        
        return $id;
    }

    /**
     * @depends testConsegueAlterarRegistro
     *
     * @param int $id            
     */
    public function testConsegueExcluirRegistro($id)
    {
        require 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        
        $conexao = new lib\Db\Conexao($config);
        $clienteMapper = new ClienteMapper($conexao);
        
        $cliente = $clienteMapper->obterPorId($id);
        
        $this->assertTrue($clienteMapper->remover($cliente));
    }

    public function testConsegueListarRegistros()
    {
        require 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        
        $conexao = new lib\Db\Conexao($config);
        $clienteMapper = new ClienteMapper($conexao);
        
        for ($x = 0; $x <= 3; $x ++) {
            $cliente = new Cliente();
            $cliente->setNomeRazao("Cliente Teste mapper-$x");
            $cliente->setCpfCnpj('292.508.638-78');
            $cliente->setEmail('cliente.mapper@gmail.com');
            $cliente->setTelefone('4044-7882');
            
            $retorno = $clienteMapper->inserir($cliente);
        }
        
        $clientes = $clienteMapper->obterTodos();
        
        $this->assertGreaterThan(2, count($clientes));
    }
}