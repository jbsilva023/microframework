<?php


namespace App\Tests\Models;


use App\Models\Cartorios;
use App\Tests\Data\Sqlite;

use PHPUnit\Framework\TestCase;

class CartoriosTest extends TestCase
{
    /**
     * @dataProvider getProvidedData
     */
    public function testCartorioStore($nome, $tabeliao, $email, $documento, $tipo_documento, $telefone, $razao, $status)
    {
        $cartorio = new Cartorios;
        $cartorio->setDriver(new Sqlite);

        $this->assertInstanceOf(Cartorios::class, $cartorio);

        $cartorio->nome = $nome;
        $cartorio->tabeliao = $tabeliao;
        $cartorio->email = $email;
        $cartorio->documento = $documento;
        $cartorio->tipo_documento = $tipo_documento;
        $cartorio->telefone = $telefone;
        $cartorio->razao = $razao;
        $cartorio->status = $status;

        $this->assertEquals($nome, $cartorio->nome);
        $this->assertEquals($tabeliao, $cartorio->tabeliao);
        $this->assertEquals($email, $cartorio->email);
        $this->assertEquals($documento, $cartorio->documento);
        $this->assertEquals($tipo_documento, $cartorio->tipo_documento);
        $this->assertEquals($telefone, $cartorio->telefone);
        $this->assertEquals($razao, $cartorio->razao);
        $this->assertEquals($status, $cartorio->status);

        $this->assertIsObject($cartorio);
    }

    public function getProvidedData(): array
    {
        return [
            [
                ['nome','Cartorio de teste 1'],
                ['tabeliao','Jonas Barbosa'],
                ['email','jbsilva023@gmail.com'],
                ['documento','02551049105'],
                ['tipo_documento',1],
                ['telefone','996470708'],
                ['razao','Cartorio de teste 1'],
                ['status',1],
            ]
        ];
    }
}