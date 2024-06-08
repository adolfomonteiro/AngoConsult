<?php
include 'db.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Verifica se as variáveis de sessão estão definidas antes de acessá-las
    $user_nome = isset($_SESSION['user_nome']) ? $_SESSION['user_nome'] : "";
    $user_funcao = isset($_SESSION['user_funcao']) ? $_SESSION['user_funcao'] : "";
} else {
    header("Location: index.php");
    exit();
}
?>


<!-- // Agora você pode usar $user_nome e $user_tipo sem erros de "Undefined array key" ou "Undefined variable"


// if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] != 'cliente') {
//     header("Location: index.php");
//     exit();
// }

// $error = '';
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $cliente_id = $_SESSION['user_id'];
//     $consultor_id = $_POST['consultor_id'];
//     $data_agendamento = $_POST['data_agendamento'];
//     $descricao = $_POST['descricao'];

//     $sql = "INSERT INTO agendamentos (cliente_id, consultor_id, data_agendamento, descricao) VALUES ('$cliente_id', '$consultor_id', '$data_agendamento', '$descricao')";
//     if ($conn->query($sql) === TRUE) {
//         echo "Consultoria agendada com sucesso!";
//     } else {
//         $error = "Erro: " . $sql . "<br>" . $conn->error;
//     }
// }

// $consultor_id = $_GET['consultor_id'];
// $consultor = $conn->query("SELECT * FROM usuarios WHERE id = '$consultor_id' AND funcao = 'consultor'")->fetch_assoc();
?> -->



<!DOCTYPE html>
<html>
<head>
    <title>Agendar Consultoria</title>
</head>
<body>
    <h2>Agendar Consultoria com <?php echo $consultor['nome']; ?></h2>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <input type="hidden" name="consultor_id" value="<?php echo $consultor['id']; ?>">
        Data e Hora: <input type="datetime-local" name="data_agendamento" required><br>
        Descrição: <textarea name="descricao"></textarea><br>
        <button type="submit">Agendar</button>
    </form>
</body>
</html>

