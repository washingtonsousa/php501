<?php

class FaleConoscoTest extends PHPUnit_Framework_TestCase
{
    
    public function testExisteFile()
    {
        $existe = false;
        $pathArquivo = 'app/Model/FaleConosco/FaleConosco.php';
    
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
        $this->faleconosco = new FaleConosco();
        $this->faleconosco->setId(10);
        $this->assertSame(10, $this->faleconosco->getId());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetNome()
    {
        $this->faleconosco = new FaleConosco();
        $this->faleconosco->setNome('Nome faleconosco');
        $this->assertSame('Nome faleconosco', $this->faleconosco->getNome());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetAssunto()
    {
        $this->faleconosco = new FaleConosco();
        $this->faleconosco->setAssunto('assunto faleconosco');
        $this->assertSame('assunto faleconosco', $this->faleconosco->getAssunto());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetMensagem()
    {
        $this->faleconosco = new FaleConosco();
        $this->faleconosco->setMensagem('mensagem faleconosco');
        $this->assertSame('mensagem faleconosco', $this->faleconosco->getMensagem());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetEmail()
    {
        $this->faleconosco = new FaleConosco();
        $this->faleconosco->setEmail('email@email.com');
        $this->assertSame('email@email.com', $this->faleconosco->getEmail());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoIsNew()
    {
        $this->faleconosco = new FaleConosco();
        $this->faleconosco->setId(10);
        $this->assertSame(false, $this->faleconosco->isNew());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testIsNewRetornoFalso()
    {
        $this->faleconosco = new FaleConosco();
        $this->assertSame(true, $this->faleconosco->isNew());
    }
}