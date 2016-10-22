<?php

class BannerTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFile()
    {
        $existe = false;
        $pathArquivo = 'app/Model/Banners/Banner.php';
        
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
        $this->banner = new Banner();
        $this->banner->setId(10);
        $this->assertSame(10, $this->banner->getId());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetNome()
    {
        $this->banner = new Banner();
        $this->banner->setNome('Nome Banner');
        $this->assertSame('Nome Banner', $this->banner->getNome());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetDescricao()
    {
        $this->banner = new Banner();
        $this->banner->setDescricao('Descricao Banner');
        $this->assertSame('Descricao Banner', $this->banner->getDescricao());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoGetSetUrl()
    {
        $this->banner = new Banner();
        $this->banner->setUrl('Url Banner');
        $this->assertSame('Url Banner', $this->banner->getUrl());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testExisteMetodoIsNew()
    {
        $this->banner = new banner();
        $this->banner->setId(10);
        $this->assertSame(false, $this->banner->isNew());
    }
    
    /**
     * @depends testExisteFile
     */
    public function testIsNewRetornoFalso()
    {
        $this->banner = new Banner();
        $this->assertSame(true, $this->banner->isNew());
    }
}