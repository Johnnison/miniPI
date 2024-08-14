<?php
/* PAGINA DE LISTAGEM DE USUARIOS*/
require 'config.php'; /* PARA INCLUIR O ARQUIVO DE CONFIGURAÇÃO PARA CONECTAR AO BANCO*/


$lista = []; /* UMA CHAMADA PARA ARRAY */
$sql = $pdo->query("SELECT * FROM usuarios");/* EXECUTA CONSULTA PARA SELECIONAR TODOS OS REGISTROS DA TABELA*/
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
    <title>Document</title>
</head>
<body>
<h1>Listagem de Usuários</h1>

<table border="1">
    <tr>
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
    <?php foreach ($lista as $usuarios): ?>
        <tr>
            <td><?= $usuarios['id']; ?></td>
            <td><?= $usuarios['primeironome']; ?></td>
            <td><?= $usuarios['sobrenome']; ?></td>
            <td><?= $usuarios['email']; ?></td>
            <td><?= $usuarios['telefone']; ?></td>
            <td><?= $usuarios['senha']; ?></td>
            <td><?= $usuarios['genero']; ?></td>
            <td>
                <?php if ($usuarios['imagemperfil']): ?>
                    <img src="image/<?= $usuarios['imagemperfil']; ?>" width="100" height="100" alt="Imagem Perfil">
                <?php else: ?>
                    <img src="IMGS-VARIADAS/IMAGEM-PADRÃO-UPLOADS.jpg" width="100" height="100" alt="Imagem Padrão">
                <?php endif; ?>
            </td>
            <td>
                <a href="atualizar.php?id=<?= $usuarios['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $usuarios['id']; ?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadastrar.php">Cadastrar Usuário</a>

</body>
</html>
