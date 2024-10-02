<?php
// Definição da classe Database que será responsável pela conexão com o banco de dados
class Database {
    // Atributos para armazenar as informações de conexão com o banco
    private $host = 'localhost'; // Endereço do servidor de banco de dados
    private $db = 'escola'; // Nome do banco de dados
    private $user = 'root'; // Usuário do banco de dados
    private $pass = ''; // Senha do banco de dados
    private $port = 3307; // Porta de conexão com o MySQL
    private $pdo; // Atributo que armazenará a instância da conexão PDO

    // Método para conectar ao banco de dados
    public function connect() {
        try {
            // Monta a string de conexão (Data Source Name - DSN) para o MySQL
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db";
            
            // Cria uma nova instância da classe PDO para conectar ao banco
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            
            // Define o modo de erro da conexão como EXCEPTION para que os erros sejam lançados como exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Em caso de erro na conexão, exibe uma mensagem com o erro
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    // Método para obter a conexão PDO
    public function getConnection() {
        return $this->pdo; // Retorna o objeto PDO para uso nas consultas
    }
}
?>
