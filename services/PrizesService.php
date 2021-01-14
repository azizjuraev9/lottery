<?php


namespace app\services;


use app\entities\Prizes;
use app\repositories\PrizesRepository;

class PrizesService
{

    public PrizesRepository $prizesRepository;

    public function __construct()
    {
        $this->prizesRepository = new PrizesRepository();
    }

    public function getRandomPrize()
    {
        return $this->prizesRepository->getAllPrizes();
    }

}