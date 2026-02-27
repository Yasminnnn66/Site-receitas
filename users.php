<?php
$dbPath = __DIR__ . '/bancodados.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$email = $argv[1];
$pwd = $argv[2];

$hash = password_hash($pwd, PASSWORD_ARGON2ID);

$sql = 'INSERT INTO users (email, password) VALUES (?, ?);';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $email);
$stmt->bindValue(2, $hash);
$stmt->execute();

//Cria a tabela "user" e define a criptografia da senha