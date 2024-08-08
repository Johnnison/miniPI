<?php
// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Criar um array com os dados do formulário, aplicando htmlspecialchars para segurança
    $dados = [
        'Primeiro Nome' => htmlspecialchars($_POST['primeiro_nome']), // Corrigido para 'primeiro_nome'
        'Sobrenome' => htmlspecialchars($_POST['sobrenome']),
        'Email' => htmlspecialchars($_POST['email']),
        'Celular' => htmlspecialchars($_POST['telefone']), // Corrigido para 'telefone'
        'Senha' => htmlspecialchars($_POST['senha']),
        'Gênero' => htmlspecialchars($_POST['genero']), // Corrigido para 'genero'
    ];

    // Exibir os dados usando print_r (para depuração)
    echo '<pre>'; // Para uma melhor formatação da saída
    print_r($dados); // Exibe o conteúdo do array $dados
    echo '</pre>';

    // Exibir os dados de forma organizada
    foreach ($dados as $chave => $valor) {
        echo $chave . ': ' . $valor . '<br>'; // Exibe cada par chave-valor em uma nova linha
    }
}


// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
  // Verifica se a imagem foi enviada e se não ocorreu erro
  if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
      // Obtém informações do arquivo da imagem
      $imagem = $_FILES['imagem_perfil'];
      $nomeImagem = $imagem['name'];
      $tipoImagem = $imagem['type'];
      $tmpImagem = $imagem['tmp_name'];
      $errorImagem = $imagem['error'];

      // Valida o tipo de imagem (ex: JPEG, PNG, GIF)
      $tiposPermitidos = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
      if (in_array($tipoImagem, $tiposPermitidos)) {
          // Gera um nome único para a imagem
          $novoNomeImagem = uniqid('perfil_', true) . '.' . pathinfo($nomeImagem, PATHINFO_EXTENSION);
          // Define o diretório onde a imagem será salva
          $diretorio = 'uploads/';

          // Move a imagem para o diretório
          if (move_uploaded_file($tmpImagem, $diretorio . $novoNomeImagem)) {
              echo "Imagem de perfil enviada com sucesso: " . $novoNomeImagem;
          } else {
              echo "Erro ao mover a imagem para o diretório.";
          }
      } else {
          echo "Formato de imagem não permitido.";
      }
  } else {
      echo "Erro no upload da imagem.";
  }
}



?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="formulario.css">
  <title>Formulário de Cadastro</title>
</head>

<body>

  <header>
    <a href="">LudoFashion</a>
    <form action="formulario.php" method="post" id="form-buscar"> <!-- Corrigido para "post" -->
      <input type="search" name="buscar" id="buscar" placeholder="buscar...">
      <button type="submit" id="btn-buscar" class="btn-transparent">
        <img src="IMG/lupaX.png" alt="buscar" class="img-search">
      </button>
    </form>

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

  <div class="form">
    <form action="formulario.php" method="POST"> <!-- Corrigido para o arquivo correto -->
      <div class="form-header">
        <div class="title">
          <h1>Cadastre-se</h1>
        </div>
        <div class="login-button">
          <button type="button" onclick="location.href='#';">Entrar</button>
        </div>
      </div>

      <div class="input-box">
        <label for="primeiro_nome">Primeiro nome</label>
        <input id="primeiro_nome" type="text" name="primeiro_nome" placeholder="Digite seu Primeiro nome" required> <!-- Corrigido para 'primeiro_nome' -->
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
        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" required> <!-- Corrigido para 'telefone' -->
      </div>

      <div class="input-box">
        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" placeholder="Digite sua Senha" required>
      </div>

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
          <label for="none">Prefiro não Dizer</label> <!-- Corrigido para 'none' -->
        </div>
      </div>


      <div class="foto-perfil">
            <img src="IMG/default-profile.png" alt="Foto de Perfil" id="foto" width="150" height="150"> <!-- Imagem de perfil padrão -->
            <input type="file" id="upload" accept="image/*"> <!-- Campo para upload da foto de perfil -->
        </div>
        <script>
        // Script para atualizar a foto de perfil quando um arquivo é selecionado
        document.getElementById('upload').addEventListener('change', function (event) {
            const file = event.target.files[0]; // Obtém o primeiro arquivo selecionado
            const reader = new FileReader(); // Cria um objeto FileReader

            reader.onload = function (e) {
                // Atualiza a imagem da foto de perfil com o arquivo selecionado
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
