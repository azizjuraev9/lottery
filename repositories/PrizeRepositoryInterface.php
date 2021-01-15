<?php


namespace app\repositories;


use app\entities\Prizes;

interface PrizeRepositoryInterface
{

    /**
     * @return Prizes[]|null
     */
    public function getAllPrizes() : ?array;

}