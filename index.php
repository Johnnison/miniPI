<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

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
            <td><?= $usuarios['imagemperfil']; ?></td>


            <td>
                <?php if ($usuarios['imagemperfil']): ?>
                    <img src="IMG/<?= $usuarios['imagemperfil']; ?>" width="100" height="100" alt="Imagem Perfil">
                <?php else: ?>
                    <img src="IMG/default-profile.png" width="100" height="100" alt="Imagem Padrão">
                <?php endif; ?>
            </td>






            <td>
                <a href="editar.php?id=<?= $usuarios['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $usuarios['id']; ?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadastrar.php">Cadastrar Usuário</a>