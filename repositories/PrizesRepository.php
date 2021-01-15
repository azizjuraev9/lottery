<?php
namespace app\repositories;

use app\entities\Prizes;

class PrizesRepository extends \app\repositories\BaseRepository implements PrizeRepositoryInterface
{

    /**
     * @return Prizes[]|null
     */
    public function getAllPrizes() : ?array
    {
        return self::$entityManager
            ->getRepository(\app\entities\Prizes::class)
            ->findAll();
    }

}