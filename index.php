<?php
/* PAGINA DE LISTAGEM DE USUARIOS*/
require 'config.php'; /* PARA INCLUIR O ARQUIVO DE CONFIGURAÇÃO PARA CONECTAR AO BANCO*/


$lista = []; /* UMA CHAMADA PARA INICIAR ARRAY VAZIO */

$sql = $pdo->query("SELECT * FROM usuarios");/* EXECUTA CONSULTA PARA SELECIONAR TODOS OS REGISTROS DA TABELA*/

/*PARA VERIFICAR SE A CONSULTA RETORNOU ALGUM RESULTADO */
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC); /* RECUPERA TODOS OS RESULTADOS DA CONSULTA COMO ARRAY ASSOCIATIVO */
}
?>




<!DOCTYPE html> <!--CRIA TABELA USUARIOS USEI foreach PARA ITERAR(REPETIR) SOBRE OS USUARIOS E EXIBILOS NA TABELA -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>LISTAGEM DE USUARIOS</title>
</head>
<body>
<h1>Listagem de Usuários</h1>

<table border="1"> <!-- CRIA UMA TABELA COM BORDA-->
    <tr> <!--CABEÇALHOS DA COLUNAS NA TABELA-->
        <th>ID</th>
        <th>Primeiro Nome</th>
        <th>Sobre Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Senha</th>
        <th>Genero</th>
        <th>Imagem Perfil</th>
        <th>AÇÕES</th>
    </tr>
<!-- LOOP PARA EXIBIR CADA USUARIO, PASSA POR CADA UM DOS USUARIOS -->
    <?php foreach ($lista as $usuarios): ?>
        <tr>
            <td><?= $usuarios['id']; ?></td> <!-- MOSTRA O ID DO USUARIO-->
            <td><?= $usuarios['primeironome']; ?></td><!--EXIBI -->
            <td><?= $usuarios['sobrenome']; ?></td><!-- EXIBI-->
            <td><?= $usuarios['email']; ?></td><!--EXIBI -->
            <td><?= $usuarios['telefone']; ?></td><!-- EXIBI-->
            <td><?= $usuarios['senha']; ?></td><!--EXIBI -->
            <td><?= $usuarios['genero']; ?></td><!--EXIBI -->
            <td>
                <?php if ($usuarios['imagemperfil']): ?>
                <!--CÓDIGO ESPECIAL PARA IMAGEM -->
                <!-- Se houver uma imagem de perfil, exibe a imagem correspondente --> 
                    <img src="image/<?= $usuarios['imagemperfil']; ?>" width="100" height="100" alt="Imagem Perfil">
                <?php else: ?>
                    <!-- Caso contrário, exibe uma imagem padrão -->
                    <img src="IMGS-VARIADAS/IMAGEM-PADRÃO-UPLOADS.jpg" width="100" height="100" alt="Imagem Padrão">
                <?php endif; ?>
            </td>
            <td>
                <!-- Links para editar e excluir o usuário -->
                <a href="atualizar.php?id=<?= $usuarios['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $usuarios['id']; ?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!--link para REDIRECIONAR para CADASTRAR um novo usuário -->
<a href="cadastrar.php">Cadastrar Usuário</a>

</body>
</html>
