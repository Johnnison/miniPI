<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style6.css"> <!-- Link para o arquivo CSS para estilos -->
    <title>Página de Perfil</title> <!-- Título da página -->
</head>

<body>
<header>
        <a href="">LudoFashion</a> <!-- Logo ou título do site -->
        <form action="" id="form-buscar">
            <input type="search" name="buscar" id="buscar" placeholder="buscar..."> <!-- Formulário de busca -->
            <button type="submit" id="btn-buscar" class="btn-transparent">
                <img src="IMG/lupaX.png" alt="buscar" class="img-search"> <!-- Ícone de busca -->
            </button>
        </form>

        <a href="" class="icon-link">
            <img src="IMG/cadastre-seX.png" alt="Cadastre-se" width="40px">
            Cadastre-se <!-- Link para cadastro -->
        </a>

        <a href="" class="icon-link">
            <img src="IMG/duvidasX.png" alt="Dúvidas" width="50px">
            Dúvidas <!-- Link para dúvidas -->
        </a>
    </header>

    <nav>
        <a href="">Catálogo</a> <!-- Link para o catálogo -->
        <a href="">Sobre a loja</a> <!-- Link para informações sobre a loja -->
    </nav>

    <div class="perfil">
        <h1>Perfil de Usuário</h1> <!-- Título da seção de perfil -->

        <div class="perfil-header"> <!-- Cabeçalho da seção de perfil, onde ficará a imagem -->
            <div class="imagem-perfil"> <!-- Div que contém a imagem de perfil -->
                <img src="IMG/imagem-perfil.png" alt="Imagem de Perfil" width="100" height="100"> <!-- Imagem de perfil do usuário -->
            </div>
        </div>







       
        <div class="info-usuario">
            <div class="campo">
                <p><strong>Nome:</strong> </p> <!-- Nome do usuário -->
            </div>
            <div class="campo">
                <p><strong>Email:</strong> </p> <!-- Email do usuário -->
            </div>
            <div class="campo">
                <p><strong>Celular:</strong> </p> <!-- Celular do usuário -->
            </div>
            <div class="campo">
                <p><strong>Gênero:</strong> </p> <!-- Gênero do usuário -->
            </div>
        </div>

        <div class="editar-perfil">
            <button onclick="location.href='editar-perfil.php';">Editar</button> <!-- Botão para editar perfil -->
        </div>
    </div>

    <footer>
        <p>&copy; 2024 LudoFashion. Todos os direitos reservados.</p> <!-- Rodapé com direitos autorais -->
    </footer>


</body>

</html>
