<?php

namespace DexterApp\Admin\Models\Service;

use DexterApp\Admin\Models\DataMapper;

class ServicoTest extends \PHPUnit_Framework_TestCase
{

    private $model;

    public function setUp()
    {
        $this->model = new Servico();
    }

    public function testShouldGetSetServicoMapper()
    {
        $mapper = new DataMapper\Servico();

        $this->assertSame($this->model, $this->model->setServicoMapper($mapper));
        $this->assertSame($mapper, $this->model->getServicoMapper());
    }

    public function testShouldGetDefaultServicoMapper()
    {
        $this->assertInstanceOf(
            '\\DexterApp\\Admin\\Models\\DataMapper\\Servico',
            $this->model->getServicoMapper()
        );
    }

    public function testShouldInsert()
    {
        $dados = array(
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg',
            'show_home' => 'Y'
        );

        $mapperMock = $this->getMock('\\DexterApp\\Admin\\Models\\DataMapper\\Servico');
        $mapperMock->expects($this->once())
            ->method('insert')
            ->with($this->equalTo(new \DexterApp\Admin\Models\Entity\Servico($dados)));

        $this->model->setServicoMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldUpdate()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg',
            'show_home' => 'Y'
        );

        $mapperMock = $this->getMock('\\DexterApp\\Admin\\Models\\DataMapper\\Servico');
        $mapperMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo(new \DexterApp\Admin\Models\Entity\Servico($dados)));

        $this->model->setServicoMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldGetServicos()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg',
            'show_home' => 'Y'
        );

        $mapperMock = $this->getMock('\\DexterApp\\Admin\\Models\\DataMapper\\Servico');
        $mapperMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array((object) $dados)));

        $this->model->setServicoMapper($mapperMock);

        $result = $this->model->getServicos();

        $this->assertCount(1, $result);
        $this->assertSame(1, $result[0]->getId());
        $this->assertSame('Titulo', $result[0]->getTitulo());
        $this->assertSame('Descrição', $result[0]->getDescricao());
    }

    public function testShouldGetServico()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg',
            'show_home' => 'Y'
        );

        $mapperMock = $this->getMock('\\DexterApp\\Admin\\Models\\DataMapper\\Servico');
        $mapperMock->expects($this->once())
            ->method('fetchById')
            ->with($this->equalTo(1))
            ->will($this->returnValue((object) $dados));

        $this->model->setServicoMapper($mapperMock);

        $result = $this->model->getServico(1);

        $this->assertEquals(new \DexterApp\Admin\Models\Entity\Servico($dados), $result);
    }
}
