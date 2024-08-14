<?php
require 'config.php';

// Função para gerar um nome único para o arquivo
function gerarNomeArquivo($extensao) {
    return uniqid() . '.' . $extensao;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $primeironome = filter_input(INPUT_POST, 'primeironome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $senha = filter_input(INPUT_POST, 'senha');
    $genero = filter_input(INPUT_POST, 'genero');

    // Verifica se o ID do usuário é válido
    if (!$id) {
        die("ID inválido.");
    }

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

    // Prepara a atualização dos dados do usuário
    $sql = "UPDATE usuarios SET 
                primeironome = :primeironome,
                sobrenome = :sobrenome,
                email = :email,
                telefone = :telefone,
                genero = :genero" .
                ($imagemperfil ? ", imagemperfil = :imagemperfil" : "") .
                ($senha ? ", senha = :senha" : "") .
            " WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':primeironome', $primeironome);
    $stmt->bindValue(':sobrenome', $sobrenome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':genero', $genero);
    $stmt->bindValue(':id', $id);

    if ($imagemperfil) {
        $stmt->bindValue(':imagemperfil', $imagemperfil);
    }

    if ($senha) {
        $stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));
    }

    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>