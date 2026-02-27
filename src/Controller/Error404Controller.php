<?php
//Caso algo não saia como o esperado, seria onde o código de erro aparece//
namespace Recipe\Mvc\Controller;
class Error404Controller implements Controller
{

    public function processaRequisicao(): void
    {
        http_response_code(404);
    }
}