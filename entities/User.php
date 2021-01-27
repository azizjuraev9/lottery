<?php


namespace app\entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;


    /**
     * @Column(type="string", nullable=false)
     * @Assert\Email
     * @Assert\Unique
     */
    private ?string $email = null;


    /** @Column(type="string", nullable=false) */
    private ?string $password = null;

    /**
     * @Column(type="integer")
     */
    private ?int $money = null;

    /**
     * @Column(type="integer")
     */
    private ?int $points = null;

    /**
     * @Column(type="string", nullable=false)
     * @Assert\Unique
     */
    private ?string $token = null;

    /**
     * @Column(type="datetime", nullable=false)
     */
    private ?string $token_expire = null;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private ?string $is_admin = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string|null
     */
    public function getTokenExpire(): ?string
    {
        return $this->token_expire;
    }

    /**
     * @param string|null $token_expire
     */
    public function setTokenExpire(?string $token_expire): void
    {
        $this->token_expire = $token_expire;
    }

    /**
     * @return string|null
     */
    public function getIsAdmin(): ?string
    {
        return $this->is_admin;
    }

    /**
     * @param string|null $is_admin
     */
    public function setIsAdmin(?string $is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    /**
     * @return int|null
     */
    public function getMoney(): ?int
    {
        return $this->money;
    }

    /**
     * @param int|null $money
     */
    public function setMoney(?int $money): void
    {
        $this->money = $money;
    }

    /**
     * @return int|null
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param int|null $points
     */
    public function setPoints(?int $points): void
    {
        $this->points = $points;
    }

}