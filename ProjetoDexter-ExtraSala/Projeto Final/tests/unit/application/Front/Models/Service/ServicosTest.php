<?php

namespace DexterApp\Front\Models\Service;

use DexterApp\Front\Models\Service\Servicos;

class ServicosTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetVantagemMapper()
    {
        $model = new Servicos();
        $mapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Vantagem');

        $this->assertSame($model, $model->setVantagemMapper($mapper));
        $this->assertSame($mapper, $model->getVantagemMapper());
    }

    public function testShouldGetDefaultVantagemMapper()
    {
        $model = new Servicos();
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\DataMapper\\Vantagem',
            $model->getVantagemMapper()
        );
    }

    public function testShouldGetServicos()
    {
        $model = new Servicos();
        $mapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Vantagem');

        $vantagemList = array(
            (object) array(
                'id' => 1,
                'imagem' => 'imagem.jpg',
                'titulo' => 'titulo',
                'descricao' => 'descricao',
                'show_home' => 'Y'
            ),
            (object) array(
                'id' => 2,
                'imagem' => 'imagem.png',
                'titulo' => 'titulo',
                'descricao' => 'descricao',
                'show_home' => 'N'
            )
        );

        $mapper->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue($vantagemList));

        $model->setVantagemMapper($mapper);

        $servicos = $model->getServicos();

        foreach ($servicos as $servico) {
            $this->assertSame(2, $servico->getId());
        }
    }
}
