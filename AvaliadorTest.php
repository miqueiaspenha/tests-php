<?php

require 'Usuario.php';
require 'Lance.php';
require 'Leilao.php';
require 'Avaliador.php';

class AvaliadorTest extends PHPUnit_Framework_TestCase
{
    public function testDevAceitarLancesEmOrdemDecrecente()
    {
        $leilao = new Leilao('Playstation 4');

        $renan= new Usuario('Renan');
        $caio = new Usuario('Caio');
        $felipe = new Usuario('Felipe');

        $leilao->propoe(new Lance($renan, 400));
        $leilao->propoe(new Lance($caio, 350));
        $leilao->propoe(new Lance($felipe, 250));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorEsperado = 400;
        $menorEsperado = 250;

        $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
        $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
    }

    public function testDevAceitarLancesGrandesEmOrdemCrecente()
    {
        $leilao = new Leilao('Playstation 4');

        $renan= new Usuario('Renan');
        $caio = new Usuario('Caio');
        $felipe = new Usuario('Felipe');

        $leilao->propoe(new Lance($felipe, 250));
        $leilao->propoe(new Lance($caio, 350));
        $leilao->propoe(new Lance($renan, 400));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorEsperado = 400;
        $menorEsperado = 250;

        $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
        $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
    }

    public function testDevePegarOsTresMaiores()
    {
        $leilao = new Leilao('Playstation 4');

        $renan = new Usuario('Renan');
        $mauricio = new Usuario('Mauricio');

        $leilao->propoe(new Lance($renan, 200));
        $leilao->propoe(new Lance($mauricio, 300));
        $leilao->propoe(new Lance($renan, 400));
        $leilao->propoe(new Lance($mauricio, 500));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $this->assertEquals(3, count($leiloeiro->getMaiores()));
        $this->assertEquals(500, $leiloeiro->getMaiores()[0]->getValor());
        $this->assertEquals(400, $leiloeiro->getMaiores()[1]->getValor());
        $this->assertEquals(300, $leiloeiro->getMaiores()[2]->getValor());
    }
}