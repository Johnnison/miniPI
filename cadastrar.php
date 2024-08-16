<?php
require_once 'config.php';
/* ///////Inclui o arquivo de configuração para a conexão com o banco de dados./////////// */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="cadastrar.css">
  <title>Formulário de Cadastro</title>
</head>

<body>


  <header>
    <a href="">LudoFashion</a>

    <!-- buscar com MÉTODO POST -->
    <form action="formulario.php" method="post" id="form-buscar"> <!-- Corrigido para "post" -->
      <input type="search" name="buscar" id="buscar" placeholder="buscar...">
      <button type="submit" id="btn-buscar" class="btn-transparent">
        <img src="IMG/lupaX.png" alt="buscar" class="img-search">
      </button>
    </form>

    <!-- Links para cadastro e dúvidas -->
    <a href="" class="icon-link">
      <img src="IMG/cadastre-seX.png" alt="Cadastre-se" width="40px">
      Cadastre-se
    </a>

    <a href="" class="icon-link">
      <img src="IMG/duvidasX.png" alt="Dúvidas" width="50px">
      Dúvidas
    </a>
  </header>

  <nav>
    <a href="">Catálogo</a>        
    <a href="">Sobre a loja</a>
  </nav>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

  <div class="form">
    <!-- Formulário para cadastro de usuário -->
<!-- enviar pelo post-->     <!--serão enviados para cadastrar_action -->     <!--enctype parmite envio de arquivo images -->
    <form method="POST" action="cadastrar_action.php" enctype="multipart/form-data"> <!-- Corrigido para o arquivo correto -->

      <div class="form-header">
            <!-- Cabeçalho do formulário -->
        <div class="title">
          <h1>Cadastrar</h1>
        </div>
        <div class="login-button">
          <button type="button" onclick="location.href='#';">Entrar</button>
        </div>
      </div>

      <div class="input-box">
        <label for="primeironome">Primeiro nome</label>
        <input id="primeironome" type="text" name="primeironome" placeholder="Digite seu Primeiro nome" required> <!--  -->
      </div>

      <div class="input-box">
        <label for="sobrenome">Sobrenome</label>
        <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu Sobrenome" required>
      </div>

      <div class="input-box">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Digite seu Email" required>
      </div>

      <div class="input-box">
        <label for="telefone">Celular</label>
        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" required> <!--  -->
      </div>

      <div class="input-box">
        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" placeholder="Digite sua Senha" required>
      </div>

     <!-- Opções de gênero -->
     <!-- usando radio para limitar para somente uma opção de genero -->
      <div class="gender-inputs">
        <div class="gender-title">
          <h6>Gênero</h6>
        </div>

        <div class="gender-input">
          <input type="radio" id="feminino" name="genero" value="feminino">
          <label for="feminino">Feminino</label>
        </div>

        <div class="gender-input">
          <input type="radio" id="masculino" name="genero" value="masculino">
          <label for="masculino">Masculino</label>
        </div>

        <div class="gender-input">
          <input type="radio" id="outros" name="genero" value="outros">
          <label for="outros">Outros</label>
        </div>

        <div class="gender-input">
          <input type="radio" id="none" name="genero" value="prefiro_nao_dizer">
          <label for="none">Prefiro não Dizer</label> <!-- -->
        </div>
      </div>


      <div class="foto-perfil">
        <!-- Exibe a foto de perfil e campo para upload -->
        <img src="" alt="Foto de Perfil" id="foto" width="150" height="150"> <!-- Imagem de perfil padrão -->
        
        <label for="imagemperfil">Imagem de Perfil:</label>
        <input type="file" name="imagemperfil" id="imagemperfil" accept="image/*"><br>

      
      </div>

    











      <script>
        // Script JAVASCRIPT 
        //SERVE PARA ATUALIZAR A IMAGEM DE PERFIL QUANDO UM ARQUIVO UM ARQUIVO É SELECIONAR 

        document.getElementById('imagemperfil').addEventListener('change', function(event) {
          const file = event.target.files[0]; // PUXA o primeiro arquivo selecionado
          const reader = new FileReader(); // Cria um objeto FileReader FAZ A LEITURA DO ARQUIVO E PODEMOS DIZER QUE EXIBI O ARQUIVO NA TELA

          reader.onload = function(e) {
            // ATUALIZA a IMAGEM da FOTO de PERFIL com o arquivo SELECIONADO
            document.getElementById('foto').src = e.target.result;
          };

          if (file) {
            reader.readAsDataURL(file); // Lê o arquivo como URL de dados
          }
        });
      </script>











      <div class="continue-button">
        <button type="submit" name="submit">Continuar</button> <!-- Adicionada a propriedade name para o botão -->
      </div>
    </form>
  </div>

  <footer>
    <p>&copy; 2024 LudoFashion. Todos os direitos reservados.</p>
  </footer>

</body>

</html>