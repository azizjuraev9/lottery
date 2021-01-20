<?php


namespace app\repositories;


use app\entities\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getByEmail(string $email): ?User
    {
        return self::$entityManager
            ->getRepository(User::class)
            ->findOneBy(['email' => $email]);
    }

    public function getById(int $id): ?User
    {
        return self::$entityManager
            ->getRepository(User::class)
            ->find($id);
    }

    public function save(string $email, string $password): void
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        self::$entityManager->persist($user);
        self::$entityManager->flush();
    }

    public function getByToken(string $token): ?User
    {
        return self::$entityManager
            ->getRepository(User::class)
            ->findOneBy(['token' => $token]);
    }
}