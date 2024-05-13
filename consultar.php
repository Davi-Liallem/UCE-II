<?php
session_start();

// Verifica se o usuário está logado como administrador
if (!isset($_SESSION["administrador"])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: administradores.php");
    exit();
}

// Inclui o arquivo de conexão com o banco de dados
include "conexao.php";

// Inicializa a variável $alunos
$alunos = [];

// Verifica se houve uma solicitação de consulta
if (isset($_POST["consultar"])) {
    // Consulta todos os alunos cadastrados
    $query = "SELECT * FROM estudantes"; // Consulta ajustada para a tabela estudantes
    $result = $mysqli->query($query);

    // Verifica se a consulta foi bem-sucedida
    if ($result) {
        // Verifica se há alunos cadastrados
        if ($result->num_rows > 0) {
            // Obtém os alunos e armazena no array
            while ($row = $result->fetch_assoc()) {
                $alunos[] = $row;
            }
        }
    } else {
        // Se a consulta falhar, exibe uma mensagem de erro
        echo "Erro ao consultar alunos: " . $mysqli->error;
    }
}

// Processa a exclusão do aluno se houver uma solicitação
if (isset($_GET["excluir"])) {
    $matricula = $_GET["excluir"];
    // Query para excluir o aluno com base na matrícula
    $query_excluir = "DELETE FROM estudantes WHERE MATRICULA = '$matricula'";
    // Executa a query
    if ($mysqli->query($query_excluir)) {
        // Redireciona de volta para esta página para atualizar a exibição
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        // Se a exclusão falhar, exibe uma mensagem de erro
        echo "Erro ao excluir aluno: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Alunos</title>
</head>
<body>
<header>
    <div>
        <h1>Consulta de Alunos</h1>
    </div>
    <div>
        <a href="inicio.php">Início</a>
        <a href="cadastro.php">Cadastro</a>
        <a href="administradores.php?logout=1">Voltar</a>
    </div>
</header>

<main>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="consultar" value="Consultar">
    </form>

    <?php if (isset($_POST["consultar"])) { ?>
        <?php if (isset($result) && $result->num_rows > 0) { ?>
            <h2>Alunos Cadastrados</h2>
            <table>
                <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Faculdade/Local</th>
                    <th>Rotas</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($alunos as $aluno) { ?>
                    <tr>
                        <td><?php echo $aluno['MATRICULA']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['TELEFONE']; ?></td>
                        <td><?php echo $aluno['ENDERECO_RUA']; ?></td>
                        <td><?php echo $aluno['FACULDADE_LOCAL']; ?></td>
                        <td><?php echo $aluno['ROTAS_EST']; ?></td>
                        <td><a href="?excluir=<?php echo $aluno['MATRICULA']; ?>">Excluir</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Nenhum aluno cadastrado.</p>
        <?php } ?>
    <?php } ?>
</main>
</body>
</html>
