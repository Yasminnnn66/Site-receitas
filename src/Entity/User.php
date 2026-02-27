<?php
//Redireciona as funções de cada item da tabela user//
namespace Recipe\Mvc\Entity;

class User
{
    public readonly int $id;
    public readonly string $email;
    public readonly string $password;
    function __construct(string $email, string $password)
    {
        $this->setEmail($email);
        $this->setPassword($password);
    }
    public function setEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("Invalid e-mail");
        }
        $this->email = $email;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}