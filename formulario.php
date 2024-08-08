<?php
// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Criar um array com os dados do formulário, aplicando htmlspecialchars para segurança
    $dados = [
        'Primeiro Nome' => htmlspecialchars($_POST['firstname']), // Armazena o primeiro nome
        'Sobrenome' => htmlspecialchars($_POST['lastname']),     // Armazena o sobrenome
        'Email' => htmlspecialchars($_POST['email']),           // Armazena o email
        'Celular' => htmlspecialchars($_POST['number']),        // Armazena o número de celular
        'Senha' => htmlspecialchars($_POST['password']),        // Armazena a senha
        'Gênero' => htmlspecialchars($_POST['gender']),         // Armazena o gênero
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
    <a href="">LudoFashion</a> <!-- Logo ou título do site -->
    <form action="formulario.php" method="$_POST" id="form-buscar">
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













  <div class="form">
    <form action="#" method="POST">
      <div class="form-header">
        <div class="title">
          <h1>Cadastre-se</h1>
        </div>
        <div class="login-button">
          <button type="button" onclick="location.href='#';">Entrar</button>
        </div>
      </div>

      <div class="input-box">
        <label for="firstname">Primeiro nome</label>
        <input id="firstname" type="text" name="firstname" placeholder="Digite seu Primeiro nome" required>
      </div>

      <div class="input-box">
        <label for="lastname">Sobrenome</label>
        <input id="lastname" type="text" name="lastname" placeholder="Digite seu Sobrenome" required>
      </div>

      <div class="input-box">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Digite seu Email" required>
      </div>

      <div class="input-box">
        <label for="number">Celular</label>
        <input id="number" type="tel" name="number" placeholder="(xx) xxxx-xxxx" required>
      </div>

      <div class="input-box">
        <label for="password">Senha</label>
        <input id="password" type="password" name="password" placeholder="Digite sua Senha" required>
      </div>

      <div class="gender-inputs">
        <div class="gender-title">
          <h6>Gênero</h6>
        </div>

        <div class="gender-input">
          <input type="radio" id="female" name="gender" value="feminino">
          <label for="female">Feminino</label>
        </div>

        <div class="gender-input">
          <input type="radio" id="male" name="gender" value="masculino">
          <label for="male">Masculino</label>
        </div>

        <div class="gender-input">
          <input type="radio" id="others" name="gender" value="outros">
          <label for="others">Outros</label>
        </div>

        <div class="gender-input">
          <input type="radio" id="none" name="gender" value="prefiro_nao_dizer">
          <label for="none">Prefiro não Dizer</label>
        </div>
      </div>

      <div class="continue-button">
        <button type="submit">Continuar</button>
      </div>
    </form>
  </div>



  <footer>
    <p>&copy; 2024 LudoFashion. Todos os direitos reservados.</p>
  </footer>


</body>

</html>