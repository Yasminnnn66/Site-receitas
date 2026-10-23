<?php
//Configura o Login//
namespace Recipe\Mvc\Controller;

class LoginController implements Controller
{
    private \PDO $pdo;

    function __construct()
    {
        $dbPath = __DIR__ . "/../../bancodados.sqlite";
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pwd = filter_input(INPUT_POST, 'pwd');

        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        $correctPassword = password_verify($pwd, $userData['password'] ?? '');

        if ($correctPassword) {
            session_regenerate_id(true);
            $_SESSION['logado'] = true;
            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
        exit;
    }
}