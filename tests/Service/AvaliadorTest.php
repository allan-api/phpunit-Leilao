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

}