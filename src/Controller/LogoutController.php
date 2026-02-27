<?php
//Encerra a sessão de Login//
namespace Recipe\Mvc\Controller;

class LogoutController implements Controller
{
    public function processaRequisicao(): void
    {
        session_destroy();
        header('Location: /login');
    }
}