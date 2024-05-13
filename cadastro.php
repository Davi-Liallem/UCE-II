<?php
// Mensagem de cadastro realizado com sucesso (inicialmente vazia)
$mensagem = "";

// Verifica se o formulário de cadastro foi enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados ("conexao.php")
    include "conexao.php";

    // Recupera os dados do formulário
    $nome_estudante = $_POST["nome_estudante"];
    $matricula = $_POST["matricula"];
    $telefone = $_POST["telefone"];
    $endereco_rua = $_POST["endereco_rua"];
    $faculdade_local = $_POST["faculdade_local"];
    $rotas_est = $_POST["rotas_est"];

    // Cria a consulta SQL para inserir os dados na tabela "estudantes"
    $query = "INSERT INTO estudantes (nome, MATRICULA, TELEFONE, ENDERECO_RUA, FACULDADE_LOCAL, ROTAS_EST) 
              VALUES ('$nome_estudante', '$matricula', '$telefone', '$endereco_rua', '$faculdade_local', '$rotas_est')";

    // Executa a consulta SQL
    if ($mysqli->query($query)) {
        // Se a consulta for executada com sucesso, define a mensagem de sucesso
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        // Se a consulta falhar, define a mensagem de erro com detalhes do erro do MySQL
        $mensagem = "Erro ao inserir dados na tabela estudantes: " . $mysqli->error;
    }

    // Fecha a conexão com o banco de dados (opcional, mas recomendado)
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Estudante</title>
</head>
<body>
<h1>Cadastro de Estudante</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nome_estudante">Nome:</label>
    <input type="text" id="nome_estudante" name="nome_estudante" required><br>
    <label for="matricula">Matrícula:</label>
    <input type="text" id="matricula" name="matricula" required><br>
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" required><br>
    <label for="endereco_rua">Endereço:</label>
    <input type="text" id="endereco_rua" name="endereco_rua" required><br>
    <label for="faculdade_local">Faculdade/Local:</label>
    <input type="text" id="faculdade_local" name="faculdade_local" required><br>
    <label for="rotas_est">Rotas:</label>
    <input type="text" id="rotas_est" name="rotas_est" required><br>
    <input type="submit" value="Cadastrar">
</form>

<?php if (!empty($mensagem)) { ?>
    <p><?php echo $mensagem; ?></p>
<?php } ?>

<a href="inicio.php">Voltar para o Início</a>
</body>
</html>
