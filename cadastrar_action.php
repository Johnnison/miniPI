

<?php

// Conexão com o banco de dados
require 'config.php';

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
        $nomeArquivoOriginal = $_FILES['imagemperfil']['name'];
        $caminhoDestino = 'image/' . $nomeArquivoOriginal;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
            $imagemperfil = $nomeArquivoOriginal;
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
            $sql->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT)); // Utilizando hash para a senha
            $sql->bindValue(':genero', $genero);
            $sql->bindValue(':imagemperfil', $imagemperfil);

            $sql->execute();

            header("Location: index.php");
            exit;
        } else {
            header("Location: cadastrar.html?error=email_existente");
            exit;
        }
    } else {
        header("Location: cadastrar.html?error=dados_incompletos");
        exit;
    }
}
?>


