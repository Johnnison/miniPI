<?php

require 'config.php';


$primeironome = filter_input(INPUT_POST, 'primeironome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$senha = filter_input(INPUT_POST, 'senha');
$genero = filter_input(INPUT_POST, 'genero');


if ($primeironome && $sobrenome && $email && $telefone && $senha && $genero) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();


    if ($sql->rowCount() === 0){

        $sql = $pdo->prepare("INSERT INTO usuarios (primeironome, sobrenome, email, telefone, senha, genero) 
        VALUES (:primeironome, :sobrenome, :email, :telefone, :senha, :genero) ");

        $sql->bindValue(':primeironome', $primeironome);
        $sql->bindValue(':sobrenome', $sobrenome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':genero', $genero);

        $sql->execute();


        header("Location: index.php");
        exit;
    }else{
        header("Location: cadastrar.php");
    }
}else{
    header("Location: cadastrar.php");
    exit;
}


?>












<?php
//UPLOADS DE IMAGENS PARA O BANCO
require 'config.php';

// Função para gerar um nome único para o arquivo
function gerarNomeArquivo($extensao) {
    return uniqid() . '.' . $extensao;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $primeironome = filter_input(INPUT_POST, 'primeironome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $senha = filter_input(INPUT_POST, 'senha');
    $genero = filter_input(INPUT_POST, 'genero');
    
    // Verifica se o arquivo foi enviado e é válido
    $imagemperfil = null;
    if (isset($_FILES['imagemperfil']) && $_FILES['imagemperfil']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['imagemperfil']['tmp_name'];
        $extensao = pathinfo($_FILES['imagemperfil']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = gerarNomeArquivo($extensao);
        $caminhoDestino = 'IMG/' . $nomeArquivo;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
            $imagemperfil = $nomeArquivo;
        }
    }

    if ($primeironome && $sobrenome && $email && $telefone && $senha && $genero) {
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() === 0) {
            $sql = $pdo->prepare("INSERT INTO usuarios (primeironome, sobrenome, email, telefone, senha, genero, imagemperfil) 
            VALUES (:primeironome, :sobrenome, :email, :telefone, :senha, :genero, :imagemperfil)");

            $sql->bindValue(':primeironome', $primeironome);
            $sql->bindValue(':sobrenome', $sobrenome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':genero', $genero);
            $sql->bindValue(':imagemperfil', $imagemperfil);

            $sql->execute();

            header("Location: index.php");
            exit;
        } else {
            header("Location: cadastrar.php");
            exit;
        }
    } else {
        header("Location: cadastrar.php");
        exit;
    }
}
?>
