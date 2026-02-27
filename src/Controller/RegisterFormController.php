<?php
//Redireciona para a o formulário de registro//
namespace Recipe\Mvc\Controller;

class RegisterFormController implements Controller
{
    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../views/register-form.php';
    }
}