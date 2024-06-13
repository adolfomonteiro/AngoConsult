<?php 
    include 'db.php';
    session_start();

    $erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $nome = $conn->real_escape_string($nome);

    $sql = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_funcao = $user['funcao'];
    if($user['funcao'] == 'Consultor'){
        header("Location: mensagens.php");
        exit();
    }
    else{
    header("Location: home.php");
    exit();
}
        if ($user['nome'] || password_verify($senha, $user['senha'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_funcao'] = $user['funcao'];
       
            echo "Tipo de usuário: " . $user['funcao'] . "<br>";
            echo "Nome do usuário: " . $user['nome'] . "<br>";
            
        } else {
            echo "<p style='color:red;'>Nome e Senha incorreta !</p>";
        }
        
    } else {

        echo "<br><br><p style='color:red;'>Usuário não Cadastrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body{ 
        height:100vh;
        margin:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
        background:gainsboro;

        display:flex;
        align-items:center;
        justify-content:center;
    }
    p{
        text-align:center;
    }
    :root{
        --cor1:#434343;
        --cor2:#FAD900;
        --cor3:#FC4850;
        --cor4:#C5CAE9;
    }
    .container-all{
        display:flex;
        padding:10;
        justify-content:space-between;
        gap:85px;
        border-radius:20px;
    }
    .container-left{
       /* background:var(--cor4);*/
        padding:10px;
        height:80vh;
        width:58vh;
        border-radius:18px;
        border-top-right-radius:0px;
        border-bottom-right-radius:0px;

    }
    .container-right{
        padding:10px;
        height:80vh;
        width:66vh;
        align-items:center;
    }
    .container-right h2{
       margin-left:-30px;
    }
    img{
        width:340px;
        height:285px;
        border-radius:100px;
        margin:auto;
        display:block;
        margin-top:60px;
    }
    h2{
        font-size:20px;
        align-items:center;
        margin-top:55px;
        font-weight:500;
    }
    h3{
        align-items:center;
        margin-top:55px;
        font-weight:500;
        text-align:center; animation:adolfo 10s infinite linear;
        content: "Ter uma ideia é certo, consultar é correcto";
        margin-top:100px;
        font-size:25px;
        transition:10s;
    }
   span{
    color:var(--cor3);
   }
   form{
    padding:30px;
    top:-10px;
    left:-80px;
    position:relative;
   }
   input{
    margin:auto;
    display:grid;
    justify-self:center;
    width:280px;
    padding:8px;
    border-radius:5px;
    border:none;
    font-size:13px;
    outline:none;
    align-items:center;
    font-family:'Poppins',sans-serif;
   }
   select{
    margin:auto;
    display:block;
    padding:8px;
    border-radius:20px;
    width:295px;
    border:0.9px solid var(--cor1); 
    font-size:13px;
    color:gray;
    border:none;
   }
   a{
    text-align:left;
    margin-bottom:10px;
    margin-left:30px;
    margin-top:10px;
    text-decoration:none;
    font-size:13px;
    display:block;
    color:var(--cor1);
   }
   input[type="submit"]{
    background:var(--cor1);
    width:290px;
    color:#fff;
    font-weight:550;
    cursor:pointer;
    font-family:'Poppins',sans-serif;
   }
   h3{
    margin-top:-30px;
    margin-left:40px;
   }
</style>
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
    <div class="container">
        <div class="container-all">
    <div class="container-left">
        <br><br><br>
    <h3>Ter uma ideia é <span>certo</span><br>
    consultar é <span>correcto</span><h3>
        <img src="loginUser.png" alt="logotipo" class="logo">
    </div>
    <div class="container-right">
    <h2>Seja Bem-Vindo a nossa página, <br>
    onde poderás fazer o devido login!</h2>

    <?php if ($erro): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>
 
        <form method="post" action="valida.php">
        <input  type="text" name="nome"  placeholder="Nome completo" required >
        <br>
        <input name="senha"  type="password" placeholder="Senha" required>
        <a href="sign-up.php">Criar conta!</a>
        <input type="submit" value="Entrar">
        <?php 
            if(isset($_SESSION['erro'])){
                echo "<p style='color:red;'>". $_SESSION['erro'] ."</p>";
                unset($_SESSION['erro']);
            }
        ?>
        </form>
    </div>
    </div>
    </div>
</body>
<script>
       document.addEventListener('DOMContentLoaded', function() {
            var progressBar = document.getElementById('progress-bar');
            progressBar.style.width = '80%';

            window.addEventListener('load', function() {
                setTimeout(function() {
                    progressBar.style.display = 'none';
                }, 500);
            });
        });
</script>
</html>