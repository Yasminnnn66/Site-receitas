<?php
//Direciona para a primeira Página//
namespace Recipe\Mvc\Controller;

class Inicio implements Controller
{

    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../views/inicio.php';
    }

}