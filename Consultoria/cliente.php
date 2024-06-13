<?php
include 'db.php';

// Iniciar consulta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_nome = $_POST['cliente_nome'];
    $consultoria_id = uniqid();

    $sql = "INSERT INTO consultoria (consultoria_id, cliente_nome, status) VALUES ('$consultoria_id', '$cliente_nome', 'ongoing')";
    if ($conn->query($sql) === TRUE) {
        header("Location: cliente.php?consultoria_id=$consultoria_id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
     
// Obter o ID da consulta
$consultoria= $_GET['consultoria_id'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultoria Online - Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php if ($consultoria_id): ?>
        <h1>Consultoria Online - Cliente</h1>
        <p>Seu ID de consulta: <?php echo $consultoria_id; ?></p>
        <iframe src="consultoria_room.php?consultoria_id=<?php echo $consultoria_id; ?>" frameborder="0" width="100%" height="600px"></iframe>
        <form action="end_consultoria.php" method="POST">
            <input type="hidden" name="consultoria_id" value="<?php echo $consultoria_id; ?>">
            <button type="submit">Encerrar Consulta</button>
        </form>
    <?php else: ?>
        <h1>Iniciar Consultoria</h1>
        <form action="cliente.php" method="POST">
            <input type="text" name="cliente_nome" placeholder="Seu Nome" required>
            <button type="submit">Iniciar Consulta</button>
        </form>
    <?php endif; ?>
</body>
</html>
