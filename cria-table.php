<?php
$dbPath = __DIR__ . '/bancodados.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$pdo->exec("CREATE TABLE recipe (
    id INTEGER PRIMARY KEY,
    url TEXT,
    title TEXT
                    
    )"
);
//Cria a tabela "recipe"