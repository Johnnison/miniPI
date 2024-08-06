<?php

// Define a constante para o tipo de banco de dados. No caso, estamos usando MySQL.
define("DRIVE", 'mysql');

// Define o nome do banco de dados ao qual você deseja se conectar.
define("NOME_DO_BANCO", 'miniPI');

// Define o local do banco de dados. Normalmente é 'localhost' para banco de dados local.
define("LOCAL_DO_BANCO", 'localhost');

// Corrige o nome da constante de "CHARSER" para "CHARSET" e define o charset para a conexão com o banco de dados.
// Usualmente, o charset recomendado para MySQL é 'utf8mb4' para garantir a compatibilidade com todos os caracteres Unicode.
define("CHARSET", "utf8mb4");

// Define o nome do usuário que será utilizado para se conectar ao banco de dados.
// Certifique-se de alterar para um nome de usuário apropriado em produção.
define("USUARIO", "root");

// Define a senha do usuário para a conexão com o banco de dados.
// Certifique-se de alterar para a senha correta e manter a segurança em mente.
define("SENHA", ""); // Adicione a senha real aqui se necessário.

