<?php
use app\Model\Funcionarios\FuncionarioMapper;
use app\Model\Funcionarios\Funcionario;

/**
 * Laboratório 6 Task4
 */
class MappersTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFilesMapper()
    {
        require_once 'config/config.php';
        require_once 'lib/Db/Conexao.php';
        require_once 'lib/Db/TableGateway.php';
        require_once 'lib/Db/AbstractDataMapper.php';
        require_once 'lib/Db/InterfaceIdentity.php';
        require_once 'lib/Db/AbstractEntity.php';
        
        $existe = true;
        
        $mappers = [
            'Funcionarios' => 'FuncionarioMapper',
            'Funcionalidades' => 'ClienteMapper',
            'Banners' => 'BannerMapper',
            'Servicos' => 'ServicoMapper',
            'Funcionalidades' => 'FuncionalidadeMapper',
            'FaleConosco' => 'FaleConoscoMapper'
        ];
        
        foreach ($mappers as $dir => $mapper) {
            
            $pathArquivo = "app/Model/$dir/$mapper.php";
            
            if (! file_exists($pathArquivo)) {
                $existe = false;
            }
            
            require_once $pathArquivo;
        }
        
        $this->assertTrue($existe);
        
        return $mappers;
    }

    /**
     * @depends testExisteFilesMapper
     */
    public function testChecaTestExisteMetodoConstrutor($mappers)
    {
        foreach ($mappers as $dir => $mapper) {
            
            $existe = true;
            
            try {
                $reflection = new ReflectionMethod("app\Model\\$dir\\$mapper::converterParaObjeto");
            } catch (ReflectionException $err) {
                $existe = false;
                echo "\n {$err->getMessage()}\n";
            }
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExisteMetodoConverterParaObjeto()
    {
        $mappers = [
            'Funcionarios' => 'FuncionarioMapper',
            'Funcionalidades' => 'ClienteMapper',
            'Banners' => 'BannerMapper',
            'Servicos' => 'ServicoMapper',
            'Funcionalidades' => 'FuncionalidadeMapper',
            'FaleConosco' => 'FaleConoscoMapper'
        ];
        
        $existe = true;
        
        foreach ($mappers as $dir => $mapper) {
            
            try {
                $reflection = new ReflectionMethod("app\Model\\$dir\\$mapper::converterParaObjeto");
            } catch (ReflectionException $err) {
                $existe = false;
                echo "\n {$err->getMessage()}\n";
            }
        }
        
        $this->assertTrue($existe);
    }

    public function testChecaExisteMetodoConverterParaArray()
    {
        $mappers = [
            'Funcionarios' => 'FuncionarioMapper',
            'Funcionalidades' => 'ClienteMapper',
            'Banners' => 'BannerMapper',
            'Servicos' => 'ServicoMapper',
            'Funcionalidades' => 'FuncionalidadeMapper',
            'FaleConosco' => 'FaleConoscoMapper'
        ];
        
        $existe = true;
        
        foreach ($mappers as $dir => $mapper) {
            
            try {
                $reflection = new ReflectionMethod("app\Model\\$dir\\$mapper::converterParaArray");
            } catch (ReflectionException $err) {
                $existe = false;
                echo "\n {$err->getMessage()}\n";
            }
        }
        
        $this->assertTrue($existe);
    }
}