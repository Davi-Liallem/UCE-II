<?php
session_start();

// Verifica se o usuário já está logado
if(isset($_SESSION["administrador"])) {
    // Se estiver logado, redireciona para a página inicial
    header("Location: inicio.php");
    exit();
}

// Inclui o arquivo de conexão com o banco de dados
include "conexao.php";

// Processamento do formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar se o usuário e a senha correspondem a um registro na tabela de administradores
    $query = "SELECT * FROM administrador WHERE USUARIO_ADM = '$usuario'";
    $resultado = $mysqli->query($query);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        if ($senha == $row["SENHA_ADM"]) { // Aqui estou comparando as senhas sem hash, ajuste conforme necessário
            // Se as credenciais estiverem corretas, inicia uma sessão para o usuário
            $_SESSION["administrador"] = $usuario;
            // Redireciona para a página inicial
            header("Location: inicio.php");
            exit();
        } else {
            // Se a senha estiver incorreta, exibe uma mensagem de erro
            $erro = "Senha incorreta.";
        }
    } else {
        // Se o usuário não for encontrado, exibe uma mensagem de erro
        $erro = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <header>
         <h1>Login</h1>
    </header>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="Digite seu usuário">
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Digite sua senha">
        <input type="submit" name="confirmar" value="Entrar">
        <?php if(isset($erro)) { ?>
            <p><?php echo $erro; ?></p>
        <?php } ?>
    </form>
</body>
</html>
