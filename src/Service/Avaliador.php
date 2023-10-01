<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;

Class Avaliador
{
    /** @var float */
    private $maiorValor = 0;


    /** @var float */
    private $menorValor = INF;

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
}