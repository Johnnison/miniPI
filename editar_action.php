<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$primeironome = filter_input(INPUT_POST, 'primeironome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$senha = filter_input(INPUT_POST, 'senha');
$genero = filter_input(INPUT_POST, 'genero');


if($id && $primeironome && $sobrenome && $email && $telefone && $senha && $genero){
    $sql = $pdo->prepare("UPDATE usuarios SET 
    
    primeironome = :primeironome,
    sobrenome = :sobrenome,
    email = :email,
    telefone = :telefone,
    senha = :senha,
    genero = :genero

    WHERE

    id = :id

    ");
    $sql->bindValue(':primeironome', $primeironome);
    $sql->bindValue(':sobrenome', $sobrenome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':genero', $genero);
    $sql->bindValue(':id', $id);

$sql->execute();
header("Location: index.php");
exit;
}else{
    header("Location: index.php");
    exit;
}