<?php

class FuncionarioTest extends PHPUnit_Framework_TestCase
{
    
    public function testExisteFile()
    {
        $existe = false;
        $pathArquivo = 'app/Model/Funcionarios/Funcionario.php';
    
        if (file_exists($pathArquivo)) {
            require $pathArquivo;
            $existe = true;
        }
    
        $this->assertTrue($existe);
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetId()
    {
        $this->funcionario = new Funcionario();
        $this->funcionario->setId(10);
        $this->assertSame(10, $this->funcionario->getId());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetNome()
    {
        $this->funcionario = new Funcionario();
        $this->funcionario->setNome('Nome funcionario');
        $this->assertSame('Nome funcionario', $this->funcionario->getNome());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetEmail()
    {
        $this->funcionario = new Funcionario();
        $this->funcionario->setEmail('email@email.com');
        $this->assertSame('email@email.com', $this->funcionario->getEmail());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetSenha()
    {
        $this->funcionario = new Funcionario();
        $this->funcionario->setEmail('123456');
        $this->assertSame('123456', $this->funcionario->getEmail());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoIsNew()
    {
        $this->funcionario = new Funcionario();
        $this->funcionario->setId(10);
        $this->assertSame(false, $this->funcionario->isNew());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testIsNewRetornoFalso()
    {
        $this->funcionario = new Funcionario();
        $this->assertSame(true, $this->funcionario->isNew());
    }
}