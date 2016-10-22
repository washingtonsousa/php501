<?php

namespace DexterApp\Front\Models\Service;

class CadastreSeTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetSetClienteMapper()
    {
        $model = new CadastreSe();
        $mapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Cliente');

        $this->assertSame($model, $model->setClienteMapper($mapper));
        $this->assertSame($mapper, $model->getClienteMapper());
    }

    public function testShouldGetDefaultClienteMapper()
    {
        $model = new CadastreSe();
        $this->assertInstanceOf(
            '\\DexterApp\\Front\\Models\\DataMapper\\Cliente',
            $model->getClienteMapper()
        );
    }

    public function testShouldSave()
    {
        $model = new CadastreSe();
        $mapper = $this->getMock('\\DexterApp\\Front\\Models\\DataMapper\\Cliente');

        $dados = array('id' => 1, 'cpf' => '1111', 'cpfCnpj' => '1111');
        $cliente = new \DexterApp\Front\Models\Entity\Cliente($dados);

        $mapper->expects($this->once())
            ->method('insert')
            ->with($this->equalTo($cliente))
            ->will($this->returnValue($expected = new \stdClass()));

        $model->setClienteMapper($mapper);

        $this->assertSame($expected, $model->save($dados));
    }

    public function testShouldGetEstados()
    {
        $model = new CadastreSe();
        $this->assertCount(27, $model->getEstados());
    }
}
