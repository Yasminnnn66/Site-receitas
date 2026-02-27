<?php
$dbPath = __DIR__ . '/bancodados.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$pdo->exec('CREATE TABLE IF NOT EXISTS users (
                        id INTEGER PRIMARY KEY, 
                        email TEXT, 
                        password TEXT);'
);
//Cria a tabela usuario