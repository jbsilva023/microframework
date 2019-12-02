<?php


namespace App\Tests\Models;


use App\Models\Cartorios;
use App\Tests\Data\Sqlite;

use PHPUnit\Framework\TestCase;

class CartoriosTest extends TestCase
{
    protected $cartorio;

    public function setUp()
    {
        $this->cartorio = new Cartorios;
        $this->cartorio->setDriver(new Sqlite);
    }


    public function testStore()
    {
        $this->assertInstanceOf(Cartorios::class, $this->cartorio);

        $this->cartorio->nome = 'Carotio teste 1';
        $this->cartorio->tabeliao = 'Jonas Barbosa da Silva';
        $this->cartorio->email = 'jbsilva023@gmail.com';
        $this->cartorio->documento = '02551049105';
        $this->cartorio->tipo_documento = 1;
        $this->cartorio->telefone = '996470708';
        $this->cartorio->razao = 'Carotio teste 1';
        $this->cartorio->status = 1;
        $this->cartorio->save();

        $this->assertEquals('Carotio teste 1', $this->cartorio->nome);
        $this->assertEquals('Jonas Barbosa da Silva', $this->cartorio->tabeliao);
        $this->assertEquals('jbsilva023@gmail.com', $this->cartorio->email);
        $this->assertEquals('02551049105', $this->cartorio->documento);
        $this->assertEquals(1, $this->cartorio->tipo_documento);
        $this->assertEquals('996470708', $this->cartorio->telefone);
        $this->assertEquals('Carotio teste 1', $this->cartorio->razao);
        $this->assertEquals(1, $this->cartorio->status);
    }

    public function testFind()
    {
        $cartorio = $this->cartorio->find(1);
        $this->assertInstanceOf(Cartorios::class, $cartorio);

        $this->assertEquals('Carotio teste 1', $cartorio->nome);
        $this->assertEquals('Jonas Barbosa da Silva', $cartorio->tabeliao);
        $this->assertEquals('jbsilva023@gmail.com', $cartorio->email);
        $this->assertEquals('02551049105', $cartorio->documento);
        $this->assertEquals(1, $cartorio->tipo_documento);
        $this->assertEquals('996470708', $cartorio->telefone);
        $this->assertEquals('Carotio teste 1', $cartorio->razao);
        $this->assertEquals(1, $cartorio->status);
    }

    public function testUpdate()
    {
        $cartorio = $this->cartorio->find(1);
        $this->assertInstanceOf(Cartorios::class, $cartorio);

        $cartorio->nome = 'Carotio teste 2';
        $cartorio->tabeliao = 'João Barbosa da Silva';
        $cartorio->email = 'joao.silva023@gmail.com';
        $cartorio->documento = '03654104910963';
        $cartorio->tipo_documento = 2;
        $cartorio->telefone = '992251051';
        $cartorio->razao = 'Carotio teste 2';
        $cartorio->status = 0;
        $cartorio->save();

        $this->assertEquals('Carotio teste 2', $cartorio->nome);
        $this->assertEquals('João Barbosa da Silva', $cartorio->tabeliao);
        $this->assertEquals('joao.silva023@gmail.com', $cartorio->email);
        $this->assertEquals('03654104910963', $cartorio->documento);
        $this->assertEquals(2, $cartorio->tipo_documento);
        $this->assertEquals('992251051', $cartorio->telefone);
        $this->assertEquals('Carotio teste 2', $cartorio->razao);
        $this->assertEquals(0, $cartorio->status);
    }

    public function testDelete()
    {
        $cartorio = $this->cartorio->find(1);
        $cartorio = $cartorio->delete();
        $this->assertNotInstanceOf(Cartorios::class, $cartorio);
    }

    public function testFindAll()
    {
        $cartorios = $this->cartorio->all();
        $this->assertIsArray($cartorios);
    }
}