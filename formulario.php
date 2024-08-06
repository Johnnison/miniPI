<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="formulario.css">

  <title>FORMULARIO LUDO</title>


</head>

<body>

  <div class="box">
    <form action="">
      <fieldset>
        <legend><b>Fórmulário de Usuarios</b></legend>
      </fieldset><br>

      <div class="inputBox">
        <input type="text" name="nome" id="nome" class="inputUser" required>
        <label for="nome">Nome Completo</label>

      </div>
<br><br>
      <div class="inputBox">
        <input type="email" name="email" id="email" class="inputUser" required>
        <label for="nome">Email</label>

      </div>
      <br><br>

      <div class="inputBox">
        <input type="tel" name="telefone" id="telefone" class="inputUser" required>
        <label for="telefone">Telefone</label>

      </div>
      <br><br>
      <p>Sexo:</p>
      <input type="radio" id="feminino" name="genero" value="feminino" required>
      <label for="feminino">Feminino</label>

      <input type="radio" id="masculino" name="genero" value="masculino" required>
      <label for="masculino">Masculino</label>


      <input type="radio" id="outro" name="genero" value="outro" required>
      <label for="outro">Outro</label>
      <br><br>

      <div class="inputBox">
        <label for="data_nascimento"> <b>Data de Nascimento:</b></label>
        <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" required>
      </div>
      <br><br>

      <div class="inputBox">
        <input type="text" name="cidade" id="cidade" class="inputUser" required>
        <label for="cidade">Cidade</label>

      </div>

      <br><br>
      <div class="inputBox">
        <input type="text" name="estado" id="estado" class="inputUser" required>
        <label for="estado">Estado</label>

      </div>
      <br><br>

      <div class="inputBox">
        <input type="text" name="endereco" id="endereco" class="inputUser" required>
        <label for="endereco">Endereco</label>

      </div>
      <br><br>
<input type="submit" name="submit" id="submit">


    </form>

  </div>




</body>

</html>