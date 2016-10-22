<?php

class AbstractEntityTest extends PHPUnit_Framework_TestCase
{

    public function testExisteFileAbstractEntity()
    {
        $existe = false;
        
        $pathClasse = 'lib/Db/AbstractEntity.php';
        $pathInterface = 'lib/Db/InterfaceIdentity.php';
        
        if (file_exists($pathClasse) && file_exists($pathInterface)) {
            require_once $pathInterface;
            require_once $pathClasse;
            $existe = true;
        }
        
        $this->assertTrue($existe);
        
        return $pathClasse;
    }

    /**
     * @depends testExisteFileAbstractEntity
     */
    public function testExisteClasseAbstractEntity($pathClasse)
    {
        $this->assertTrue(class_exists('AbstractEntity'));
    }

    public function testExisteMetodoIsNew()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('AbstractEntity::isNew');
        } catch (ReflectionException $err) {
            $erro = false;
            echo "\n {$err->getMessage()} \n";
        }
        
        $this->assertTrue($existe);
    }

    public function testExisteMetodoGetId()
    {
        $existe = true;
        
        try {
            $reflection = new ReflectionMethod('AbstractEntity::getId');
        } catch (ReflectionException $err) {
            $existe = false;
            echo "\n {$err->getMessage()} \n";
        }
        
        $this->assertTrue($existe);
    }

    public function testAbstractEntityImplementaInterfaceIdentity()
    {
        $reflection = new ReflectionClass('AbstractEntity');
        $interface = $reflection->getInterfaces();
        $this->assertTrue(array_key_exists('InterfaceIdentity', $interface));
    }

    public function testeEntidadesExtendsAbstractEntity()
    {
        $entidades = [
            'Cliente',
            'Banner',
            'Funcionario',
            'Funcionalidade',
            'Servico',
            'FaleConosco'
        ];
        
        $extends = true;
        
        foreach ($entidades as $entidade) {
            $pathClasse = "app/Model/$entidade" . 's/' . $entidade;
            
            if ($entidade == 'FaleConosco') {
                $pathClasse = "app/Model/$entidade" . '/' . $entidade;
            }
            
            require "$pathClasse.php";
            $entidade = new $entidade();
            $return = $entidade instanceof AbstractEntity;
            if (! $return) {
                $extends = false;
            }
        }
        
        $this->assertTrue($extends);
    }
}