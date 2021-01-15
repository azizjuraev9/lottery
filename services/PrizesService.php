<?php


namespace app\services;


use app\repositories\PrizeRepositoryInterface;

class PrizesService
{

    public PrizeRepositoryInterface $prizesRepository;

    public function __construct(PrizeRepositoryInterface $prizesRepository)
    {
        $this->prizesRepository = $prizesRepository;
    }

    public function getRandomPrize()
    {
        $prizes = $this->prizesRepository->getAllPrizes();


        $sum = 0;
        $rates = [];
        foreach ($prizes as $k => $prize)
        {
            $sum += $prize->getProbability();
            $rates[$k] = [$prize->getId(),$sum];
        }

        $rand = rand(0,$sum);

        $i = 0;
        $r = count($prizes) - 1;
        while ($i < $r)
        {
            $m = (int)( ($i + $r) / 2 );
            if( $rates[$m][1] < $rand )
            {
                $i = $m + 1;
            }
            else
            {
                $r = $m;
            }
        }

        return $prizes[$i];
    }

}