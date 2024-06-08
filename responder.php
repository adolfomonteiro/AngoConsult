<?php
    include("config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];

        $sql = "UPDATE produto SET nome='$nome', preco='$preco', categoria='$categoria' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php"); 
        } else {
            echo "Erro de Atualização: " . $conn->error;
        }
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM produto WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color:blueviolet;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Produto</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
            <label for="preco">Preco:</label>
            <input type="number" min="0" id="preco" name="preco" value="<?php echo $row['preco']; ?>" required>
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" value="<?php echo $row['categoria']; ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
<?php
}
$conn->close();
?>
