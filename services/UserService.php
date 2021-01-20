<?php


namespace app\services;


use app\entities\User;
use app\helpers\Session;
use app\helpers\SessionInterface;
use app\repositories\UserRepositoryInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class UserService
{

    const TOKEN_LIFETIME = 259200; //seconds
    const SESSION_UID_FIELD = 'USER_ID';

    private static ?User $user = null;

    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * @var SessionInterface
     */
    private SessionInterface $session;

    private array $errors;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->session = Session::getSession();
    }

    public function login(string $email, string $password) : bool
    {
        $user = $this->userRepository->getByEmail($email);

        if(!$user)
            return false;

        if(!password_verify($password,$user->getPassword()))
            return false;

        $this->setUser($user);

        return true;
    }

    public function loginByToken(string $token) : bool
    {
        $user = $this->userRepository->getByToken($token);

        if(!$user)
            return false;

        if($user->getTokenExpire() > date('Y-m-d H:i:s'))
            return false;

        $this->setUser($user);

        return true;
    }

    public function register(string $email, string $password) : bool
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $violations = $validator->validate($this);

        if($violations->count() > 0)
        {
            $this->setErrors($violations);
            return false;
        }

        $password = password_hash($password,PASSWORD_DEFAULT);
        $this->userRepository->save($email,$password);

        return true;
    }

    public function setUser(User $user): void
    {
        $this->session->set(self::SESSION_UID_FIELD,$user->getId());
        self::$user = $user;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        if(self::$user)
            return self::$user;

        $id = $this->session->get(self::SESSION_UID_FIELD,true);
        if($id)
            return null;

        self::$user = $this->userRepository->getById($id);

        if(!self::$user)
            return null;

        return self::$user;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
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

    protected function generateToken() : string
    {
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        return $token;
    }
}