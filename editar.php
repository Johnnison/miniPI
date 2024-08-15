<?php
require 'config.php';

$usuarios = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");                   
    $sql->bindValue(':id', $id);                                                                                                       //blindvalue melhora segurança
    $sql->execute();

    if ($sql->rowCount() > 0) {                                                                                                        //rowcont retorna usuarios
        $usuarios = $sql->fetch(PDO::FETCH_ASSOC);   //associativo array
    } else {
        header("Location: index.php"); // Se nenhum usuário for encontrado, redireciona para a página principal e encerra o script
        exit;
    }
} else {
    header("Location: index.php");// Se nao redireciona para a página principal
}

?>

<h1>Editar Usuário</h1>
<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuarios['id'];?>"/>
    <label>
        Primeiro Nome: <input type="text" name="primeironome" value="<?=$usuarios['primeironome'];?>"/>
    </label>
    <br>

    <label>
        Sobre Nome: <input type="text" name="sobrenome" value="<?=$usuarios['sobrenome'];?>"/>
    </label>
    <br>
    <label>
        Email: <input type="text" name="email" value="<?=$usuarios['email'];?>"/>
    </label>
    <br>
    <label>
        Telefone: <input type="text" name="telefone" value="<?=$usuarios['telefone'];?>"/>
    </label>
    <br>
    <label>
        Senha: <input type="text" name="senha" value="<?=$usuarios['senha'];?>"/>
    </label>
<br>
    <label>
        Genero: <input type="text" name="genero" value="<?=$usuarios['genero'];?>"/>
    </label>
    <br>
    <label>
        Imagem Perfil: <input type="text" name="imagemperfil" value="<?=$usuarios['imagemperfil'];?>"/>
        <input type="file" id="id" accept="image"> 
    </label>
    <br>
    <input type="submit" value="Atualizar"/>
</form>