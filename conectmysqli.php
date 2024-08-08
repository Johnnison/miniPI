<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = '';
$dbName = 'minipi'; // Adicione o ponto e vírgula no final da declaração

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) 

//{

    echo "Erro";
//}

//else

//{

    echo "Conexão efetuada com sucesso!";
//}

   
