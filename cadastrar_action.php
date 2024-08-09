<?php

require 'config.php';

$primeironome = filter_input(INPUT_POST, 'primeironome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$senha = filter_input(INPUT_POST, 'senha');
$genero = filter_input(INPUT_POST, 'genero');


$sql = $pdo->prepare("INSERT INTO usuarios (primeironome, sobrenome, email, telefone, senha, genero) VALUES (:primeironome, :sobrenome, :email, :telefone, :senha, :genero) ");

$sql->bindValue(':primeironome', $primeironome);
$sql->bindValue(':sobrenome', $sobrenome);
$sql->bindValue(':email', $email);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':senha', $senha);
$sql->bindValue(':genero', $genero);
$sql->execute();


header("Location: index.php");

