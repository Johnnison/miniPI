<?php
require 'config.php';

// Função para gerar um nome único para o arquivo
function gerarNomeArquivo($extensao) {
    return uniqid() . '.' . $extensao; //RETORNA UM NOME UNICO COM A EXTENSÃO FORNECIDA
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT); //DEVE SER INTEIRO
    $primeironome = filter_input(INPUT_POST, 'primeironome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $senha = filter_input(INPUT_POST, 'senha');
    $genero = filter_input(INPUT_POST, 'genero');

    // Verifica se o ID do usuário é válido
    if (!$id) {
        die("ID inválido."); //SE NÃO ELE EXIBI UMA MENSAGEM DE ERRO 
    }

    // Verifica se o arquivo foi enviado e é válido
    $imagemperfil = null;
    if (isset($_FILES['imagemperfil']) && $_FILES['imagemperfil']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['imagemperfil']['tmp_name'];//CAMINHO TEMPORARIO DO ARQUIVO
        $nomeArquivoOriginal = $_FILES['imagemperfil']['name'];//NOME ORIGINAL DO ARQUIVO
        $caminhoDestino = 'image/' . $nomeArquivoOriginal; //CAMINHO ONDE O ARQUIVO É SALVO

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
            $imagemperfil = $nomeArquivoOriginal; //ATUALIZA A VARIAVEL COM O NOME DO ARQUIVO DA IMAGEM DE PERFIL
        }
    }

    // UPDATE NO BANCO DE DADOS Prepara a atualização dos dados do usuário
    $sql = "UPDATE usuarios SET 
                primeironome = :primeironome,
                sobrenome = :sobrenome,
                email = :email,
                telefone = :telefone,
                genero = :genero" .
                ($imagemperfil ? ", imagemperfil = :imagemperfil" : "") . //ADICIONA O CAMPO IMAGEM PERFIL SE UMA IMAGEM FOI ENVIADA
                ($senha ? ", senha = :senha" : "") .
            " WHERE id = :id";// CONDIÇÃO PARA IDENTIFICAR O USUARIO A SER ATUALIZADO

    $stmt = $pdo->prepare($sql);//PREPARE A CONSULTA PARA EXECUÇÃO
    $stmt->bindValue(':primeironome', $primeironome);//VINCULANDO VALORES AO PARAMENTROS DA CONSULTA
    $stmt->bindValue(':sobrenome', $sobrenome);                           //blind envia valor separad ban
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':genero', $genero);
    $stmt->bindValue(':id', $id);
    

    //SE A IMAGEM DE PERFIL FOR FORNECIDA VINCULE O VALOR
    if ($imagemperfil) {
        $stmt->bindValue(':imagemperfil', $imagemperfil);
    }

    //SE A SENHA FOR FORNCEDA VINCULE E APLIQUE HASH PARA SEGURANÇA
    if ($senha) {
        $stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT)); //TRANSFORMA A SENHA EM CÓDIGO ALEATORIO QUE NAO PODE SER REVERTIDO
    }

    $stmt->execute();

    header("Location: index.php");//REDIRECIONA PARA A PAGINA PRINCIPAL APÓS A CONSULTA
    exit;
}
?>