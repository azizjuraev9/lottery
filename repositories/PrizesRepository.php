<?php
namespace app\repositories;

class PrizesRepository extends \app\repositories\BaseRepository
{

    public function getAllPrizes()
    {
        return self::$entityManager
            ->getRepository(\app\entities\Prizes::class)
            ->findAll();
    }

}