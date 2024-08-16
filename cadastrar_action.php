

<?php

// Conexão com o banco de dados

require 'config.php';


// Verifica se o formulário foi enviado CHECA SE É METODO POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $primeironome = filter_input(INPUT_POST, 'primeironome');
    //RECUPERA O VALOR DO CAMPO E FILTRA PARA GARANTIR QUE NÃO HAJA DADOS MALICIOSOS O MESMO FUNCIONA PARA OS OUTROS
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $senha = filter_input(INPUT_POST, 'senha');
    $genero = filter_input(INPUT_POST, 'genero');

    // VERIFICA SE O ARQUIVO DE IMAGEM FOI ENVIADO E SE NÃO OCORREU ERROS
    $imagemperfil = null; // INICIALIZA A VARIAVEL PARA IMAGEM PERFIL COM VALOR NULO
    if (isset($_FILES['imagemperfil']) && $_FILES['imagemperfil']['error'] === UPLOAD_ERR_OK) {
        // CHECA SE O ARQUIVO FOI ENVIADO E SE NÃO HOUVE ERRO NA CARGA DO ARQUIVO 
        $arquivoTmp = $_FILES['imagemperfil']['tmp_name'];
        $nomeArquivoOriginal = $_FILES['imagemperfil']['name'];
        $caminhoDestino = 'image/' . $nomeArquivoOriginal;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
            $imagemperfil = $nomeArquivoOriginal;// ATUALIZA A VARIAVEL $IMAGEMPERFIL COM O NOME DO ARQUIVO PARA SALVAR NO BANCO DE DADOS
        }
    }


    //VERIFICA SE OS CAMPOS OBRIGATORIOS FORAM PREENCHIDOS E SE TEM VALOS NÃO NULO
    if ($primeironome && $sobrenome && $email && $telefone && $senha && $genero) {

        //VERIFICA SE JÁ EXISTE UM USUÁRIO COM O MESMO E-MAIL
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email); //VALIDAÇÃO PARA PREAPAR UMA CONSULTA SQL PARA VERIFICAR SE TEM ALGUM USUARIO COM O MESMO E-MAIL
        $sql->execute();//EXECUTA A CONSULTA 

        if ($sql->rowCount() === 0) { //VERIFICA SE A CONSULTA NÃO RETORNOU NENHUM RESULTADO (ou seja, o e-mail não está registrado).

            //INSERI UM NOVO USUARIO NA TABELA 
            $sql = $pdo->prepare("INSERT INTO usuarios (primeironome, sobrenome, email, telefone, senha, genero, imagemperfil) 
            VALUES (:primeironome, :sobrenome, :email, :telefone, :senha, :genero, :imagemperfil)");
            //PREPARA UMA CONSULTA SQL PARA INSERIR UM NOVO USUARIO NA TABELA 

            $sql->bindValue(':primeironome', $primeironome); //VINCULA O VALOR DO PRIMEIRO NOME NA CONSULTA
            $sql->bindValue(':sobrenome', $sobrenome);//VINCULA O VALOR DO SOBRE NOME NA CONSULTA
            $sql->bindValue(':email', $email);//VINCULA O VALOR DO E-MAIL NA CONSULTA
            $sql->bindValue(':telefone', $telefone);//VINCULA O VALOR DO TELEFONE NA CONSULTA
            $sql->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));  // VINCULA a SENHA na CONSULTA SQL, utilizando o password_hash para CRIPTOGRAFAR SENHA antes de armazená-la no BANCO
            $sql->bindValue(':genero', $genero);//VINCULA O VALOR DO GENERO NA CONSULTA
            $sql->bindValue(':imagemperfil', $imagemperfil);//VINCULA O VALOR DO IMAGEMPERFIL NA CONSULTA

            $sql->execute();//EXECUTA A CONSULTA PARA INSERIR O NOVO USUARIO
            
                              //pag.usuarios
            header("Location: index.php");//// REDIRECIONA O USUÁRIO PARA A PÁGINA 'index.php' APÓS O SUCESSO DA INSERÇÃO.
            exit; //// Termina o script para garantir que o redirecionamento ocorra.
        } else {
            // Se o e-mail já estiver registrado
            header("Location: cadastrar.html?error=email_existente");
            // Redireciona o usuário de volta para a página de cadastro com um erro indicando que o e-mail já existe.
            exit;// Termina o script para garantir que o redirecionamento ocorra.
        }
    } else {
         // Se algum dos campos obrigatórios não estiver preenchido
        header("Location: cadastrar.html?error=dados_incompletos");
        // Redireciona o usuário de volta para a página de cadastro com um erro indicando que os dados estão incompletos.
        exit;
                // Termina o script para garantir que o redirecionamento ocorra.

    }
}
?>


