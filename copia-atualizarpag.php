<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="atualizarpag.css">
    
    <title>Atualizar Usuário</title>
</head> 
<body>                                                                                           <!-- ml cha transf caracte special em simpl html-->
    <h1>Atualizar Usuário</h1>
    <form action="prossesar_atualizacao.php" method="POST" enctype="multipart/form-data">         <!-- AUMENTA A SEGURANÇA -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">

        <label for="primeironome">Primeiro Nome:</label>
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
        <select name="genero" id="genero" required> <!-- VERIFIQUE E VALIDA SE O GENERO REALMENTE BATE COM O ID USUARIO NO BANCO -->
            <option value="masculino" <?php echo $usuario['genero'] === 'masculino' ? 'selected' : ''; ?>>Masculino</option>
            <option value="feminino" <?php echo $usuario['genero'] === 'feminino' ? 'selected' : ''; ?>>Feminino</option>
            <option value="outro" <?php echo $usuario['genero'] === 'outro' ? 'selected' : ''; ?>>Outro</option>
        </select><br>

        <label for="imagemperfil">Imagem de Perfil:</label>
        <input type="file" name="imagemperfil" id="imagemperfil" accept="image/*"><br>
       
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>