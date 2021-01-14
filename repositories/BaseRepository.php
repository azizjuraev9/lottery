<?php


namespace app\repositories;


use Doctrine\ORM\EntityManager;

class BaseRepository
{

    protected static ?EntityManager $entityManager = null;

    public static function setEntityManager(EntityManager $entityManager)
    {
        self::$entityManager = $entityManager;
    }

}