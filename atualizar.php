<?php
 //VALIDAÇÃO E RECUPERAÇÃO DE DADOS

require 'config.php';// INCLUIR O ARQUIVO DE CONFIGURAÇÃO DE CONEXÃO DO BANCO

// Verifica se o ID do usuário foi passado via GET
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); //valida se é inteiro

if ($id) {
    // Consulta os dados do usuário ATRAVÉS DO ID
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id"); // PREPAROU UMA CONSULTA

    $sql->bindValue(':id', $id); //VINCULA O PARAMETRO ID AO PARAMETRO DA CONSULTA /// bind= os dados fornecidos pelo usuário são separados do código SQL.
    $sql->execute();//EXECUTA A CONSULTA 

    //VERIFICA SE APENAS UM USUARIO FOI ENCONTRADO COM O ID FORNECIDO
    if ($sql->rowCount() === 1) {
        //BUSCA OS DADOS DO USUARIO EM FORMATO DE ARRAY ASSOCIATIVO
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        //SE NENHUM USUARIO FOI ENCONTRADO, EXIBE UMA MENSAGEM DE ERRO E ENCERRA O SCRIPT 
        die("Usuário não encontrado.");
    }
} else {
    // SE O ID NÃO FOI FORNECIDO OU É INVALIDO, EXIBE UMA MENSAGEM DE ERRO E ENCERRA O SCRIPT
    die("ID não fornecido.");
}
?>






<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="atualizarpag.css">
    
    <title>Atualizar Usuário</title>
</head>
<body>
    <h1>Atualizar Usuário</h1>
    <form action="prossesar_atualizacao.php" method="POST" enctype="multipart/form-data">
        <!-- Campo oculto para enviar o ID do usuário junto com o formulário -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">

        <label for="primeironome">Primeiro Nome:</label>                      <!--htmlspecialchars garante que os dados sejam exibidos corretamento no navegador -->
        <input type="text" name="primeironome" id="primeironome" value="<?php echo htmlspecialchars($usuario['primeironome']); ?>" required><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" value="<?php echo htmlspecialchars($usuario['sobrenome']); ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required><br>

        <label for="senha">Senha (deixe em branco para não alterar):</label>
        <input type="password" name="senha" id="senha"><br>

        <label for="genero">Gênero:</label>
        <select name="genero" id="genero" required> <!-- CAMPO DE SELEÇÃO DE GENERO COM ID GENERO-->
            <option value="masculino" <?php echo $usuario['genero'] === 'masculino' ? 'selected' : ''; ?>>Masculino</option> <!-- código php embutido dentro do html-->
            <option value="feminino" <?php echo $usuario['genero'] === 'feminino' ? 'selected' : ''; ?>>Feminino</option> <!-- $usuario[genero] isso verifica se o valor feminino é 
            exatamente o mesmo que ta no id--> 
            <option value="outro" <?php echo $usuario['genero'] === 'outro' ? 'selected' : ''; ?>>Outro</option>
        </select><br>

        <label for="imagemperfil">Imagem de Perfil:</label>
        <input type="file" name="imagemperfil" id="imagemperfil" accept="image/*"><br>
       
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>