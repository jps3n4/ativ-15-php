<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Cria uma instância da classe Database e conecta ao banco
$database = new Database();
$database->connect();

// Obtém a conexão PDO para ser usada nas operações com o banco de dados
$pdo = $database->getConnection();

// Verifica se o parâmetro 'id' foi passado via GET (indica que um aluno deve ser excluído)
if (isset($_GET['id'])) {
    // Obtém o valor do ID a partir do parâmetro 'id' da URL
    $id = $_GET['id'];
    
    // Prepara a consulta para deletar o aluno cujo ID é o fornecido
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    
    // Executa a consulta passando o ID como parâmetro
    $stmt->execute([$id]);

    // Redireciona o usuário de volta para a página principal após a exclusão
    header("Location: index.php");
    exit(); // Garante que o script termine aqui e o redirecionamento ocorra
}
?>
