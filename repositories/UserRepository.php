<?php


namespace app\repositories;


use app\entities\User;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    private array $errors;

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

    public function save(array $data): bool
    {
        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setToken($data['token']);
        $user->setTokenExpire($data['token_expire']);
        $user->setIsAdmin($data['is_admin']);

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $violations = $validator->validate($user);

        if($violations->count() > 0)
        {
            $this->setErrors($violations);
            return false;
        }

        self::$entityManager->persist($user);
        self::$entityManager->flush();
        return true;
    }

    public function getByToken(string $token): ?User
    {
        return self::$entityManager
            ->getRepository(User::class)
            ->findOneBy(['token' => $token]);
    }

    /**
     * @param ConstraintViolationListInterface $violations
     */
    public function setErrors(ConstraintViolationListInterface $violations) : void
    {
        foreach ($violations as $violation)
        {
            /**
             * @var ConstraintViolationInterface $violation
             */
            $this->errors[$violation->getPropertyPath()] = $violation->getMessage();
        }
    }

    public function resetToken(User $user, string $token, string $expire): bool
    {
        $user->setToken($token);
        $user->setTokenExpire($expire);
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $violations = $validator->validate($user);

        if($violations->count() > 0)
        {
            $this->setErrors($violations);
            return false;
        }

        self::$entityManager->persist($user);
        self::$entityManager->flush();
        return true;
    }
}