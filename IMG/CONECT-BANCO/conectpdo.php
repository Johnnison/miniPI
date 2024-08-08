<?php

// Definindo as variáveis para os parâmetros de conexão ao banco de dados
$dbHost = "localhost";        // O endereço do servidor de banco de dados (geralmente 'localhost' para bancos locais)
$dbUsername = "root";         // O nome de usuário para se conectar ao banco de dados
$dbPassword = '';             // A senha para se conectar ao banco de dados (vazia por padrão)
$dbName = 'minipi';           // O nome do banco de dados ao qual você deseja se conectar

try {
    // Criação da instância PDO para conectar ao banco de dados
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8";  // DSN (Data Source Name) define o tipo de banco de dados, o host e o nome do banco
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);  // Cria uma nova instância PDO com o DSN, nome de usuário e senha

    // Configurando o modo de erro do PDO para Exception para lidar com erros mais facilmente
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensagem de sucesso se a conexão for estabelecida sem problemas
    echo "Conexão efetuada com sucesso";

} catch (PDOException $e) {
    // Captura e exibe a mensagem de erro em caso de falha na conexão
    echo "Erro: " . $e->getMessage();
}

?>
