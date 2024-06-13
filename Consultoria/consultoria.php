<?php 
    session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_funcao'] != 'Cliente') {    
    header("Location:index.php");
    exit();
}
include 'db.php';

$consultor_id = $_SESSION['user_id'];
$consultor_nome = $_SESSION['user_nome'];

$sql = "SELECT m.message, m.data_envio, u.nome AS cliente_nome FROM message m JOIN usuarios u ON m.cliente_id = u.id WHERE m.consultor_id = '$consultor_id' ORDER BY m.data_envio DESC";
$result = $conn->query($sql);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    date_default_timezone_set('Africa/Luanda');
    $consultor_id = $_POST['consultor_id'];
    $mensagem = $_POST['mensagem'];
    $data_envio = date('Y-m-d H:i:s');

    $consultor_id = $conn->real_escape_string($consultor_id);
    $mensagem = $conn->real_escape_string($mensagem);

    $sql = "INSERT INTO message (cliente_id,consultor_id, mensagem,data_envio) VALUES ('$cliente_id,','$consultor_id','$mensagem','$data_envio')";
    if($conn->query($sql) === TRUE){
        echo "<p style='color:green;'>Mensagem enviada com sucesso!</p>";
    }
    else{
        echo "<p style='color:red;'>Erro ao enviar a mensagem: " .$conn->error."</p>";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>FeedBack Consultoria</title>
</head>
<body>
<div id="progress-bar"></div>
<style>
  #progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 6px;
            background-color: #C5CAE9;
            z-index: 9999;
            transition: width 1s ease-out;
        }

        /* Animação para o loader */
        @keyframes progress {
            0% { width: 0; }
            50% { width: 10%; }
            100% { width: 50%; }
        }
  </style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    *{
        margin:0;
        top:0;
        box-sizing:border-box;
    }    
    body{
         height:100vh;
            font-family:'Poppins',sans-serif;
        }
        :root{
        --cor1:#434343;
        --cor2:#FAD900;
        --cor3:#FC4850;
        --cor4:#C5CAE9;
    }
        header{
            display:flex;
            justify-content:space-around;
            padding:10px;
        }
        .logo{
            margin-top:10px;
        }
        nav{
            display:flex;
            gap:10px;
            justify-content:center;
            align-items:center;
        }
        form{
            margin:auto;
            display:block;
        }
        main{
            margin:auto;
            display:block;
        }
        a{
            text-decoration:none;
        }
        button{
            width:140px;
            height:35px;
            margin-top:10px;
            background:var(--cor1);
            color:white;
            border-radius:30px;
            border:none;
            padding:5px;
            cursor:pointer;
            margin:auto;
            display:block;
            margin-left:480px;
        }
        button:hover{
            box-shadow:0px 0px 8px var(--cor1);
            transition:0.1s linear;
        }
        label{
            font-weight:600;
            color:var(--cor1);
            margin:auto;
            display:block;
            text-align:center;
        }
        textarea{
            padding:8px;
            width:450px;
            border-radius:5px;
            border:1px solid var(--cor4);
            height:150px;
            color:var(--cor1);
            font-size:14px;
            font-family:'Poppins',sans-serif;
            margin:auto;
            display:block;
        }
        select{
            width:450px;
            padding:5px;
            height:30px;
            border:1px solid var(--cor4);
            border-radius:5px;
            font-family:'Poppins',sans-serif;
            margin:auto;
            display:block;
        }
        .paleta1{
            background:var(--cor1);
            position:absolute;
            top:400px;
            width:100px;
            height:200px;
            left:10px;
            border-bottom-right-radius:none;
            border-top-right-radius:300px;
            border-bottom-left-radius:none;
        }
        .paleta2{
            background:var(--cor2);
            position:absolute;
            top:-20px;
            width:100px;
            height:200px;
            left:10px;
            border-bottom-right-radius:none;
            border-top-left-radius:none;
            border-bottom-right-radius:300px; 
        }
        .paleta3{
            background:var(--cor3);
            position:absolute;
            top:-20px;
            width:100px;
            height:200px;
            left:1160px;
            border-top-right-radius:none;
            border-bottom-left-radius:300px;
            border-top-left-radius:none;
            border-bottom-right-radius:none; 
        }
        .paleta4{
            background:var(--cor4);
            position:absolute;
            top:400px;
            width:100px;
            height:200px;
            left:1160px;
            border-bottom-right-radius:none;
            border-top-left-radius:300px;
            border-bottom-right-radius:none; 
        }
        .btn{
            display:flex;
            justify-content:space-between;
        }
        #agendar{
            margin-left:650px;
            margin-top:-35px;
        }
        h1{
            text-align:center;
        //    margin-left:-610px;
        }
        p{
            text-align:center;
        }
</style>

    <header>
        <nav>
            <ul>
                <h1 class="link-active">
                  <?php echo htmlspecialchars($consultor_nome); ?> Faça Já a sua Agenda
                </h1>
            </ul>
        </nav>
    </header>
    <main>
    <form method="post" action="agendar.php">
        <br>
        <label for="">Mensagem :</label>
        <textarea name="mensagem" id="mensagem" rows="4" cols="50" required></textarea>
        <br>
        <div class="btn">
        <button type="submit">Enviar Mensagem</button>
        </div>
    </form>
    <a href="home.php">
        <button id="agendar">Voltar</button>
    </a>
    <div class="paleta1"></div>
    <div class="paleta2"></div>
    <div class="paleta3"></div>
    <div class="paleta4"></div>
    </main>
</body>
<script>
       document.addEventListener('DOMContentLoaded', function() {
            var progressBar = document.getElementById('progress-bar');
            progressBar.style.width = '50%';

            window.addEventListener('load', function() {
                setTimeout(function() {
                    progressBar.style.display = 'none';
                }, 500);
            });
        });
</script>
</html>