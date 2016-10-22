<?php

class ClienteTest extends PHPUnit_Framework_TestCase
{
    
    
    public function testExisteFile()
    {
        $existe = false;
        $pathArquivo = 'app/Model/Clientes/Cliente.php';
    
        if(file_exists($pathArquivo)){
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
        $this->cliente = new Cliente();
        $this->cliente->setId(10);
        $this->assertSame(10, $this->cliente->getId());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetNome()
    {
        $this->cliente = new Cliente();
        $this->cliente->setNomeRazao('Cliente Teste');
        $this->assertSame('Cliente Teste', $this->cliente->getNomeRazao());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetEmail()
    {
        $this->cliente = new Cliente();
        $this->cliente->setEmail('cliente@gmail.com');
        $this->assertSame('cliente@gmail.com', $this->cliente->getEmail());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetTelefone()
    {
        $this->cliente = new Cliente();
        $this->cliente->setTelefone('4044-2010');
        $this->assertSame('4044-2010', $this->cliente->getTelefone());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetCpfCnpj()
    {
        $this->cliente = new Cliente();
        $this->cliente->setCpfCnpj('4044-2010');
        $this->assertSame('4044-2010', $this->cliente->getCpfCnpj());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoIsNew()
    {
        $this->cliente = new Cliente();
        $this->cliente->setId(10);
        $this->assertSame(false, $this->cliente->isNew());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testIsNewRetornoFalso()
    {
        $this->banner = new Cliente();
        $this->assertSame(true, $this->banner->isNew());
    }
}