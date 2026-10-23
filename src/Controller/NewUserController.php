<?php

namespace Recipe\Mvc\Controller;
//Configura a criação de um novo usuario//


use Recipe\Mvc\Entity\User;
use Recipe\Mvc\Repository\UserRepository;

class NewUserController implements Controller
{
    function __construct(private UserRepository $userRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: /?sucesso=0');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password');
        if (!is_string($password) || strlen($password) < 8) {
            header('Location: /?sucesso=0');
            exit();
        }

        $result = $this->userRepository->add(new User($email, $password));

        if ($result === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}