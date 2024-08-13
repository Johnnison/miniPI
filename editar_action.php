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
?>




<?php
//UPLOADS DE ARQUIVOS PARA O BANCO DE DADOS
require 'config.php';

// Função para gerar um nome único para o arquivo
function gerarNomeArquivo($extensao) {
    return uniqid() . '.' . $extensao;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id');
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

    if ($id && $primeironome && $sobrenome && $email && $telefone && $senha && $genero) {
        $sql = $pdo->prepare("UPDATE usuarios SET 
            primeironome = :primeironome,
            sobrenome = :sobrenome,
            email = :email,
            telefone = :telefone,
            senha = :senha,
            genero = :genero,
            imagemperfil = :imagemperfil
            WHERE id = :id");

        $sql->bindValue(':primeironome', $primeironome);
        $sql->bindValue(':sobrenome', $sobrenome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':genero', $genero);
        $sql->bindValue(':imagemperfil', $imagemperfil);
        $sql->bindValue(':id', $id);

        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

