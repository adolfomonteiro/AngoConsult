<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_funcao'] != 'Consultor') {
    header("Location: index.php");
    exit();
}

include 'db.php';
$consultor_id = $_SESSION['user_id'];
$consultor_nome = $_SESSION['user_nome'];

$sql = "SELECT m.mensagem, m.data_envio, u.nome AS cliente_nome FROM mensagens m JOIN usuarios u ON m.cliente_id = u.id WHERE m.consultor_id = '$consultor_id' ORDER BY m.data_envio DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<head>
    <title>Mensagens</title>
</head>
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
        main{
            margin:auto;
            display:block;
        }
        .logo{
            margin-top:10px;
        }
        nav{
            display:flex;
            gap:20px;
            justify-content:center;
            align-items:center;
        }
        ul{
            display:flex;
            justify-content:center;
            gap:30px;
        }
        li{
            list-style:none;
        }
        .link-active{
            color:var(--cor1);
            font-weight:600;
        }
        a{
            text-decoration:none;
            color:var(--cor1);
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
        }
        button:hover{
            box-shadow:0px 0px 8px var(--cor1);
            transition:0.1s linear;
        }
        input[type="submit"]{
            width:140px;
            height:35px;
            margin-top:10px;
            background:var(--cor1);
            color:white;
            border-radius:30px;
            border:none;
            padding:5px;
            cursor:pointer;
        }
        input[type="submit"]:hover{
            box-shadow:0px 0px 8px var(--cor1);
            transition:0.1s linear;
        }

        .btn-agendar{
            color:var(--cor1);
            background:white;
        }
        .btn-agendar:hover{
            box-shadow:0px 0px 8px #fff;
            transition:0.1s linear;
        }
        .landing{
            display:flex;
            justify-content:space-between;
            background:var(--cor1);
            height:380px;
            width:100%;
        }
        .landing-text{
            justify-content:center;
        }
        .landing-h1{
            align-items:center;
            margin:60px 50px 0px -10px;
            color:#fff;
            justify-content:center;
        }
        .landing-p{
            align-items:center;
            margin:10px 400px 0px -25px;
            color:#fff;
        }
        .landing-img{
            width:100px;
            height:100px;
            margin-left:-10px;
            
        }
        .consultora-img{
            border-top-right-radius:30px;
            border-bottom-right-radius:30px;
        }
        .btn-agendar{
            margin:-30px;
            margin-top:20px;
            font-size:16px;
            color:var(--cor1);
        }
        .consultoria{
            padding:3px;
            width:100%;
            height:auto;
        }
        .consultora-img{
            flex:1;
        }
        .consultoria-h1{
            color:var(--cor1);
            margin:25px;
        }
        .consultoria-p{
            color:var(--cor1);
            margin:0px 25px -190px;
        }
        .consultoria h2{
            margin:25px;
            max-width:max-content;
            color:var(--cor2);
        }
        .consultoria{
            justify-content:space-around;
            display:flex;
        }
        .img-consultores{
            border-radius:35px;
        }
        .ver-mais{
            border:1px solid var(--cor4);
            background:var(--cor4);
            color:#fff;
            font-size:16px;
            position:relative;
            top:180px;
            margin:25px;
        }
        .ver-mais:hover {
            box-shadow:0px 0px 8px var(--cor4);
            color:#fff;
            transition:.2s linear;
        }
        .lista{
            display:flex;
            justify-content:space-around;
            background:var(--cor1);
            max-width:50%;
            margin:auto;
            font-size:12px;
            padding:8px;
            color:var(--cor4);
            border-radius:30px;
        }
        .sobre{
            display:flex;
            justify-content:space-between;
            margin:25px;
        }
        .sobre-text h2{
            color:var(--cor2);
        }
        .sobre-texto{
            display:flex;
            justify-content:space-around;
            gap:30px;
            margin:10px;
        }
        .sobre-p{
            font-size:13px;
        }
        .sobre-p1{
            font-size:13px;
            display:flex;
        }
        .servicos{
            display:flex;
           justify-content:space-around;
        }
         h2{
            text-align:center;
            align-items:center;
            margin:auto;
            display:grid;
            color:var(--cor2);
        }
        .servicos-im{
            display:block;
            margin:auto;
            margin-left:-55px;
        }
        .servicos-i{
            display:block;
            margin:auto;
            margin-left:-55px;
        }
        .img-servicos{
            border-radius:30px;
        }
        .svg{
            margin:-65px 15px 0px;
            cursor:pointer;
            margin-top:10px;
        }
        h3{
            margin-top:-30px;
            margin-left:60px;
            color:var(--cor3);
            font-weight:500;
        }
        .contacto h2{
            margin:25px;
            color:var(--cor2);
        }
        .contacto{
            display:block;
            justify-content:space-between;
        }
        .contacto-h1{
           display:flex;
           justify-content:space-between;
        }
        .nome{
            margin:25px;
        }
        label{
            font-weight:600;
            color:var(--cor1);
        }
        input{
            padding:8px;
            width:220px;
            border-radius:5px;
            border:1px solid var(--cor4);
            font-family:'Poppins',sans-serif;
        }
        textarea{
            padding:8px;
            width:450px;
            border-radius:5px;
            border:1px solid var(--cor4);
            height:150px;
            color:var(--cor4);
            font-size:14px;
            font-family:'Poppins',sans-serif;
        }
        .form-input{
            width:450px;
        }
        .nome1{
            margin-left:-10px;
            flex:1;
            margin-top:25px;
        }
        .nome2{
            left:-450px;
            flex:1;
            margin-top:95px;
            position:relative;
        }
        .nome3{
            flex:1;
            position:relative;
            left:-900px;
            top:160px;
        }
        .prim{
            display:flex;
            justify-content:space-between;
        }
        .img-contacto{
            left:-370px;
            position:relative;
            border-top-left-radius:35px;
            border-bottom-left-radius:35px;
        }
        footer{
            background:var(--cor3);
            padding:30px;
            width: 100%;
            margin-top:150px;
            height:250px;
            flex:1;
            align-items:center;
            border-top-left-radius:35px;
            border-top-right-radius:35px;
            color:#fff;
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
        .footer1{
            display:flex;
            justify-content:space-between;
        }
        .footer2{
            display:block;
            color:#fff;
        }
        .footer1 img{
            top:30px;
            position: relative;
        }
        table{
            padding:20px;
            border:1px solid #ccc;
            width: 90%;
            text-align:left;
            margin:auto;
        }
        tr{
        
            padding:20px;
        }
        th{   
            padding:10px;
            text-align:center;
            background:#f2f2f2;
        }
        p{
            text-align:center;
            color:red;
        }
    </style>
<body>
    <header>
    <h1><?php echo htmlspecialchars($consultor_nome); ?> logado!</h1>
    <p><a href="logout.php">Sair</a></p>
    </header>
    <div class="paleta1"></div>
    <div class="paleta2"></div>
    <div class="paleta3"></div>
    <div class="paleta4"></div>
    <main>
    <h2>Mensagens Recebidas</h2>
    <?php
    if($conn->connect_error){
        die("Conexao Falhou: ". $conn->connect_error);
    }
    $sql = "SELECT  m.mensagem, m.data_envio, u.nome AS cliente_nome FROM mensagens m JOIN usuarios u ON m.cliente_id = u.id WHERE m.consultor_id = '$consultor_id' ORDER BY m.data_envio DESC";

    $result = $conn->query($sql);
    
    if($result->num_rows>0){
    echo "<table>
        <tr>
            <th>Cliente</th>
            <th>Mensagem</th>
            <th>Data</th>
            <th>Responder</th>
        </tr>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
            <td>" . htmlspecialchars($row['cliente_nome'])."</td>
            <td>" . htmlspecialchars($row['mensagem'])."</td>
            <td>" . htmlspecialchars($row['data_envio'])."</td>
            <td>
            <a href='mensagens.php".isset($row["id"])."'>Responder |<a href='delete.php?id=".isset($row["id"])."'> Apagar</a></td>";
            "</tr>";
        }
        echo "</table>";
    }else{
     echo "<p>Nenhuma mensagem recebida.</p>";   
    }
    $conn->close();
    ?>
      </main>
</body>
</html>
