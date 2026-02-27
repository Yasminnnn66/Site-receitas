<?php
//Comando de adicionar um novo usuario//
namespace Recipe\Mvc\Repository;

use Recipe\Mvc\Entity\User;

class UserRepository
{
    public function __construct(private \PDO $pdo)
    {
    }

    public function add(User $user): bool
    {
        $hash = password_hash($user->password, PASSWORD_ARGON2ID);

        $sql = 'INSERT INTO users (email, password) VALUES (?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $user->email);
        $stmt->bindValue(2, $hash);

        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();

        $user->setId(intval($id));

        return $result;
    }
}