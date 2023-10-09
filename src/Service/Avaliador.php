<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;

Class Avaliador
{
    /** @var float */
    private $maiorValor = 0;


    /** @var float */
    private $menorValor = INF;

    /** @var array */
    private $maioreslances;

    public function Avalia(Leilao $leilao): void
    {
        $lances = $leilao->getLances();
        foreach ($lances as $lance) {
            if($lance->getValor() > $this->maiorValor){
                $this->maiorValor = $lance->getValor();
            }
            if($lance->getValor() < $this->menorValor){
                $this->menorValor = $lance->getValor();
            }
        }

        usort($lances, function(Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        });
        $this->maioreslances = array_slice($lances, 0, 3);
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }

    /**
     * @return float|int
     */
    public function getMenorValor(): float
    {
        return $this->menorValor;
    }

    /**
     * @return Lance[]
     */
    public function getMaioreslances(): array
    {
        return $this->maioreslances;
    }
}