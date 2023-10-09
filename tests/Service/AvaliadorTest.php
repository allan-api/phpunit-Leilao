<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function testAvaliadorDeveEncontrarMaiorLanceEmOrdemCrescente()
    {
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro = new Avaliador();

        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        self::assertEquals(2500, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarMaiorLanceEmOrderDecrescente()
    {
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        self::assertEquals(2500, $maiorValor);
    }
    public function testAvaliadorDeveEncontrarMenorLanceEmOrderCrescente()
    {
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        self::assertEquals(2000, $menorValor);
    }
    public function testAvaliadorDeveEncontrarMenorLanceEmOrderDecrescente()
    {
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro = new Avaliador();

        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        self::assertEquals(2000, $menorValor);
    }

    public function testAvaliadorDeveBuscarOs3maioresLances() {
        $leilao = new Leilao('Fiat 147 0KM');

        $joao = new Usuario('Joao');
        $maria = new Usuario('Maria');
        $ana = new Usuario('Ana');
        $jorge = new Usuario('Jorge');

        $leilao->recebeLance(new Lance($joao, 1500));
        $leilao->recebeLance(new Lance($maria, 1000));
        $leilao->recebeLance(new Lance($ana, 2000));
        $leilao->recebeLance(new Lance($jorge, 1700));

        $leiloeiro = new Avaliador();
        $leiloeiro->Avalia($leilao);
        $maioresLances = $leiloeiro->getMaioreslances();


        self::assertCount(3, $maioresLances);
        self::assertEquals(2000, $maioresLances[0]->getValor());
        self::assertEquals(1700, $maioresLances[1]->getValor());
        self::assertEquals(1500, $maioresLances[2]->getValor());
    }
}