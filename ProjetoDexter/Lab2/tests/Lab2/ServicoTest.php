<?php

class ServicoTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFile()
    {
        $existe = false;
        $pathArquivo = 'app/Model/Servicos/Servico.php';
        
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
        $this->servico = new Servico();
        $this->servico->setId(10);
        $this->assertSame(10, $this->servico->getId());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetNome()
    {
        $this->servico = new Servico();
        $this->servico->setNome('Nome servico');
        $this->assertSame('Nome servico', $this->servico->getNome());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetDescricao()
    {
        $this->servico = new Servico();
        $this->servico->setDescricao('Descricao servico');
        $this->assertSame('Descricao servico', $this->servico->getDescricao());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetUrlIcone()
    {
        $this->servico = new Servico();
        $this->servico->setUrlIcone('Url servico');
        $this->assertSame('Url servico', $this->servico->getUrlIcone());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetHome()
    {
        $this->servico = new Servico();
        $this->servico->setHome(false);
        $this->assertFalse($this->servico->getHome());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoIsNew()
    {
        $this->servico = new Servico();
        $this->servico->setId(10);
        $this->assertSame(false, $this->servico->isNew());
    }

    /**
     * @depends testExisteFile
     */
    public function testIsNewRetornoFalso()
    {
        $this->servico = new Servico();
        $this->assertSame(true, $this->servico->isNew());
    }
}