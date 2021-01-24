<?php


namespace app\repositories;


use app\entities\User;

interface UserRepositoryInterface
{

    public function getByEmail(string $email) : ?User;

    public function getByToken(string $token) : ?User;

    public function getById(int $id): ?User;

    public function save(array $data): bool;

}