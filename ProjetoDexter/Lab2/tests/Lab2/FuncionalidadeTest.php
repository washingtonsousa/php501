<?php

class FuncionalidadesTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFile()
    {
        $existe = false;
        $pathArquivo = 'app/Model/Funcionalidades/Funcionalidade.php';
        
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
        $this->funcionalidades = new Funcionalidade();
        $this->funcionalidades->setId(10);
        $this->assertSame(10, $this->funcionalidades->getId());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetNome()
    {
        $this->funcionalidades = new Funcionalidade();
        $this->funcionalidades->setNome('Nome funcionalidades');
        $this->assertSame('Nome funcionalidades', $this->funcionalidades->getNome());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetDescricao()
    {
        $this->funcionalidades = new Funcionalidade();
        $this->funcionalidades->setDescricao('Descricao funcionalidades');
        $this->assertSame('Descricao funcionalidades', $this->funcionalidades->getDescricao());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetUrlIcone()
    {
        $this->funcionalidades = new Funcionalidade();
        $this->funcionalidades->setUrlIcone('Url funcionalidades');
        $this->assertSame('Url funcionalidades', $this->funcionalidades->getUrlIcone());
    }

    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoIsNew()
    {
        $this->funcionalidades = new Funcionalidade();
        $this->funcionalidades->setId(10);
        $this->assertSame(false, $this->funcionalidades->isNew());
    }

    /**
     * @depends testExisteFile
     */
    public function testIsNewRetornoFalso()
    {
        $this->funcionalidades = new Funcionalidade();
        $this->assertSame(true, $this->funcionalidades->isNew());
    }
}