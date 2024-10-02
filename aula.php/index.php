<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="css\style.css"> <!-- Link para o arquivo CSS -->
    
    <?php 
        // Inclui o arquivo de conexão com o banco de dados
        require_once 'db.php';
        
        // Cria uma instância da classe Database e conecta ao banco
        $database = new Database();
        $database->connect();
        
        // Obtém a conexão PDO para ser usada nas consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
    <div class="box">
        <h1>Cadastro de alunos</h1>
        
        <!-- Formulário de Cadastro -->
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br> <!-- Campo para o nome do aluno -->

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required><br> <!-- Campo para a idade do aluno -->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br> <!-- Campo para o email do aluno -->

            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" required><br> <!-- Campo para o curso do aluno -->

            <input type="submit" value="Cadastrar"> <!-- Botão de submissão do formulário -->
        </form>
    </div>

    <!-- Listagem de Alunos -->
    <h2>Alunos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ação</th>
        </tr>
        <?php
        // Prepara a consulta para buscar todos os alunos do banco de dados
        $stmt = $pdo->prepare("SELECT * FROM alunos");
        $stmt->execute(); // Executa a consulta
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtém todos os resultados como um array associativo
        
        // Percorre cada aluno e exibe na tabela
        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>" . $aluno['id'] . "</td>"; // Coluna ID do aluno
            echo "<td>" . $aluno['nome'] . "</td>"; // Coluna Nome do aluno
            echo "<td>" . $aluno['idade'] . "</td>"; // Coluna Idade do aluno
            echo "<td>" . $aluno['email'] . "</td>"; // Coluna Email do aluno
            echo "<td>" . $aluno['curso'] . "</td>"; // Coluna Curso do aluno
            // Coluna com link para excluir o aluno
            echo "<td><a href='deletar.php?id=" . $aluno['id'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
