<?php
require 'lib/Db/InterfaceIdentity.php';
require 'lib/Db/AbstractEntity.php';

/**
 * Laboratório 4 Task2
 * 
 * @author Denis
 *        
 */
class NamespaceTest extends PHPUnit_Framework_TestCase
{

    public function testExisteNamespaceNasEntidades()
    {
        $entidades = [
            'Cliente',
            'Banner',
            'Funcionario',
            'Funcionalidade',
            'Servico',
            'FaleConosco'
        ];
        
        $existe = true;
        
        foreach ($entidades as $entidade) {
            $pathClasse = "app/Model/$entidade" . 's/' . $entidade;
            
            if ($entidade == 'FaleConosco') {
                $pathClasse = "app/Model/$entidade" . '/' . $entidade;
            }
            
            require "$pathClasse.php";
            
            $reflection = new ReflectionClass(str_replace('/', '\\', $pathClasse));
            
            if (! $reflection->getNamespaceName()) {
                $existe = false;
            }
        }
        
        $this->assertTrue($existe);
    }

    public function testNamespaceEntidadeCorreto()
    {
        $entidades = [
            'Cliente',
            'Banner',
            'Funcionario',
            'Funcionalidade',
            'Servico',
            'FaleConosco'
        ];
        
        $existe = true;
        
        foreach ($entidades as $entidade) {
            $pathClasse = "app/Model/$entidade" . 's';
            
            if ($entidade == 'FaleConosco') {
                $pathClasse = "app/Model/$entidade";
            }
            
            $reflection = new ReflectionClass(str_replace('/', '\\', "$pathClasse/$entidade"));
            
            $this->assertSame(str_replace('/', '\\', $pathClasse), $reflection->getNamespaceName());
        }
    }
}