<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Sanitizar e validar entrada
    $nome = $conn->real_escape_string($nome);

    // Consultar o banco de dados para obter as informações do usuário
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_funcao'] = $user['funcao'];

            if ($user['funcao'] == 'Consultor') {
                header("Location: mensagens.php");
                exit();
            } elseif ($user['funcao'] == 'Cliente') {
                header("Location: home.php");
                exit();
            } else {
                echo "Função de usuário não reconhecida.";
            }
        } else {
            $_SESSION['erro'] = "Senha incorreta.";
            header("Location:index.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Esta conta não Existe!.";
        header("Location:index.php");
        exit();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
