<?php
use lib\Db\Conexao;
use lib\Db\TableGateway;

/**
 * Laboratório 6 Task3
 *
 * @author Denis
 *        
 */
class TableGatewayTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileTableGateway()
    {
        $existe = false;
        
        $pathArquivo = 'lib/Db/TableGateway.php';
        
        if (file_exists($pathArquivo)) {
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathArquivo;
    }

    /**
     * @depends testExisteFileTableGateway
     */
    public function testchecaTestExisteMetodoConstrutor($pathArquivo)
    {
        require_once $pathArquivo;
        
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('lib\Db\TableGateway::__construct');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExistePropriedades()
    {
        $existe = true;
        
        try {
            $reflectionConexao = new ReflectionProperty('lib\Db\TableGateway', 'conexao');
            $reflectionTabela = new ReflectionProperty('lib\Db\TableGateway', 'tabela');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($existe);
    }

    public function testSeEPrivadoPropriedades()
    {
        $existe = true;
        
        try {
            $reflectionConexao = new ReflectionProperty('lib\Db\TableGateway', 'conexao');
            $reflectionTabela = new ReflectionProperty('lib\Db\TableGateway', 'tabela');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()}\n";
        }
        
        $this->assertTrue($reflectionConexao->isPrivate());
        $this->assertTrue($reflectionTabela->isPrivate());
    }

    public function testExisteMetodos()
    {
        $existe = true;
        $metodos = [
            'buscarRegistro',
            'listar',
            'inserir',
            'alterar',
            'excluir'
        ];
        
        try {
            foreach ($metodos as $metodo) {
                $reflection = new ReflectionMethod("lib\Db\TableGateway::$metodo");
            }
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
        $conexao = new lib\Db\Conexao($config);
        $table = new lib\Db\TableGateway($conexao, 'clientes');
        
        $cliente = [
            'nome_razao' => 'Cliente Teste',
            'cpf_cnpj' => '292.508.638-55',
            'email' => 'cliente.teste@gmail.com',
            'telefone' => '4044-2015'
        ];
        
        $retorno = $table->inserir($cliente);
        
        $this->assertTrue($retorno);
        
        return $cliente['email'];
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
        $table = new lib\Db\TableGateway($conexao, 'clientes');
        
        $retorno = $table->buscarRegistro([
            'email' => $email
        ]);
        
        $this->assertSame('Cliente Teste', $retorno['nome_razao']);
        
        return $retorno['id'];
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
        $table = new lib\Db\TableGateway($conexao, 'clientes');
        
        $cliente = [
            'nome_razao' => 'Cliente Teste Alterado',
            'cpf_cnpj' => '292.508.638-55',
            'email' => 'cliente.teste@gmail.com',
            'telefone' => '4044-2015'
        ];
        
        $table->alterar($id, $cliente);
        
        $clienteAlterado = $table->buscarRegistro([
            'id' => $id
        ]);
        
        $this->assertSame('Cliente Teste Alterado', $clienteAlterado['nome_razao']);
        
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
        $table = new lib\Db\TableGateway($conexao, 'clientes');
        
        $this->assertTrue($table->excluir($id));
    }

    public function testConsegueListarRegistros()
    {
        require 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        
        $conexao = new lib\Db\Conexao($config);
        $table = new lib\Db\TableGateway($conexao, 'clientes');
        
        for ($x = 0; $x <= 3; $x ++) {
            $cliente = [
                'nome_razao' => 'Cliente Teste' . $x,
                'cpf_cnpj' => '292.508.638-55',
                'email' => 'cliente.teste@gmail.com',
                'telefone' => '4044-2015'
            ];
            
            $retorno = $table->inserir($cliente);
        }
        
        $clientes = $table->listar();
        
        $this->assertGreaterThan(2, count($clientes));
    }
}