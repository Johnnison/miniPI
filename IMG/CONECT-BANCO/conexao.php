<?php 

class Conexao {
    // Método estático para criar e retornar uma conexão com o banco de dados
    public static function conectar() {
        // Definir constantes para as informações de conexão
        // As constantes devem ser definidas em outro lugar do seu código ou configuração.
        // Aqui, suponha-se que essas constantes são definidas como:
        // define('DRIVE', 'mysql');
        // define('LOCAL_DO_BANCO', 'localhost');
        // define('NOME_DO_BANCO', 'nome_do_banco');
        // define('CHARSET', 'utf8mb4');
        // define('USUARIO', 'usuario');
        // define('SENHA', 'senha');

        try {
            // Cria uma nova instância de PDO para a conexão com o banco de dados
            $conn = new PDO(
                DRIVE . ":host=" . LOCAL_DO_BANCO . ";dbname=" . NOME_DO_BANCO . ";charset=" . CHARSET,
                USUARIO,
                SENHA
            );
            
            // Define o modo de erro para exceções, permitindo capturar e tratar erros
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Retorna a conexão estabelecida
            return $conn;
        } catch (PDOException $e) {
            // Captura e exibe a mensagem de erro em caso de falha na conexão
            echo "Falha na conexão com o banco de dados: " . $e->getMessage();
            // Você pode também optar por registrar o erro em um arquivo de log
            // error_log($e->getMessage());
            return null; // Retorna null em caso de erro
        }
    }
}
