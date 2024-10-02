<?php
require_once 'db.php';
$database = new Database();
$database->connect();
$pdo = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $stmt = $pdo->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $idade, $email, $curso]);

    // Redireciona para a página principal
    header("Location: index.php");
    exit();
}
?>