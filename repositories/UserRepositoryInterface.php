<?php


namespace app\repositories;


use app\entities\User;

interface UserRepositoryInterface
{

    public function getByEmail(string $email) : ?User;

    public function getById(int $id): ?User;

    public function save(string $email, string $password): void;

}