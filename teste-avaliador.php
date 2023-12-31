<?php

require 'vendor/autoload.php';

use Alura\Leilao\Service\Avaliador;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Model\Lance;

$leilao = new Leilao('Fiat 147 0KM');

$maria = new Usuario('Maria');
$joao = new Usuario('Joao');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();
$leiloeiro->Avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

echo $maiorValor;

