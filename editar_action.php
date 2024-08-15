<?php
require 'config.php';

// Função para gerar um nome único para o arquivo
function gerarNomeArquivo($extensao) {
    return uniqid() . '.' . $extensao;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe dados do formulário
    $id = filter_input(INPUT_POST, 'id');
    $primeironome = filter_input(INPUT_POST, 'primeironome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone');
    $senha = filter_input(INPUT_POST, 'senha');
    $genero = filter_input(INPUT_POST, 'genero');
    
    // Inicializa a variável para imagem de perfil
    $imagemperfil = null;
    
    // Verifica se o arquivo foi enviado e é válido
    if (isset($_FILES['imagemperfil']) && $_FILES['imagemperfil']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['imagemperfil']['tmp_name'];
        $extensao = pathinfo($_FILES['imagemperfil']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = gerarNomeArquivo($extensao);
        $caminhoDestino = 'image/' . $nomeArquivo;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
            $imagemperfil = $nomeArquivo;
        } else {
            // Em caso de falha ao mover o arquivo
            $imagemperfil = null;
        }
    }

    // Verifica se todos os dados são válidos
    if ($id && $primeironome && $sobrenome && $email && $telefone && $senha && $genero) {
        // Se uma nova imagem foi carregada, atualiza o caminho da imagem
        if ($imagemperfil) {
            // Atualiza os dados no banco de dados
            $sql = $pdo->prepare("UPDATE usuarios SET 
                primeironome = :primeironome,
                sobrenome = :sobrenome,
                email = :email,
                telefone = :telefone,
                senha = :senha,
                genero = :genero,
                imagemperfil = :imagemperfil
                WHERE id = :id");

            $sql->bindValue(':imagemperfil', $imagemperfil);
        } else {
            // Caso não tenha imagem, atualiza apenas os outros dados
            $sql = $pdo->prepare("UPDATE usuarios SET 
                primeironome = :primeironome,
                sobrenome = :sobrenome,
                email = :email,
                telefone = :telefone,
                senha = :senha,
                genero = :genero
                WHERE id = :id");
        }
                                                                                       //ban separadame
        $sql->bindValue(':primeironome', $primeironome);   
        $sql->bindValue(':sobrenome', $sobrenome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':genero', $genero);
        $sql->bindValue(':id', $id);

        $sql->execute();
    }

    header("Location: index.php");
    exit;
}
?>
