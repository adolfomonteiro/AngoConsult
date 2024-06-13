<?php
    include 'db.php';
    session_start();

    // if (isset($_SESSION['user_id'])) {
    //     header("Location: index.php");
    //     exit();
    // }

    // $user_id = $_SESSION['user_id'];
    // $user_nome = isset($_SESSION['user_nome'])? $_SESSION['user_nome'] : '';
    // $user_funcao = isset($_SESSION['user_funcao'])? $_SESSION['user_funcao']: '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Landing Page</title>
    <style>
        /* Estilos para a barra de progresso */
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

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
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
            font-family:'Poppins',sans-serif;
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
            color:var(--cor4);
        }
        a:hover{
            transition:0.3s linear;
            color:var(--cor1);
            font-weight:600;
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
            margin:0px 25px;
        }
        .sobre-p{
            color:var(--cor1);
            margin:0px 25px;
        }
        .sobre-img img{
            border-radius:30px;
            max-width:100%;
            height:auto;
        }
        .sobre-img {
            width:400px;
        }
        .nossatime {
            display:flex;
            justify-content:space-around;
            align-items:center;
            text-align:center;
        }
        .consultor-img {
            max-width:100%;
            height:auto;
            border-radius:50%;
            margin:10px;
        }
        .text {
            color:var(--cor1);
            font-weight:600;
        }
        .cards-consultores {
            display:flex;
            justify-content:center;
            margin:auto;
        }
        .card-time {
            border-radius:30px;
            border:1px solid var(--cor1);
            max-width:150px;
            margin:25px;
            padding:5px;
        }
        .footer {
            display:flex;
            justify-content:space-between;
            margin:25px;
        }
        .text {
            color:var(--cor1);
            font-weight:600;
        }
    </style>
</head>
<body>
    <!-- Barra de progresso -->
    <div id="progress-bar"></div>

    <header>
        <h1 class="logo"> <img src="Assets/LogoMakr.png" alt="Logo da Pet Fero" class="logo"> Pet Fero</h1>
        <nav>
            <ul>
                <li> <a href="#" class="link-active">Home</a></li>
                <li> <a href="#">Consultoria</a></li>
                <li> <a href="#">Sobre nós</a></li>
                <li> <a href="#">Nosso Time</a></li>
            </ul>
        </nav>
        <button type="button" onclick="window.location.href='login.php'">Entrar</button>
    </header>
    <section class="landing">
        <div class="landing-text">
            <h1 class="landing-h1">Consultoria e Auditoria Pet Fero </h1>
            <p class="landing-p"> Garantimos a segurança e qualidade dos nossos produtos e serviços
                para manter o seu melhor amigo saudável e feliz</p>
            <button class="btn-agendar" type="button" onclick="window.location.href='agendar.php'">Agendar Consultoria</button>
        </div>
        <div class="landing-img">
            <img src="Assets/consultora.png" alt="Consultora Pet Fero" class="consultora-img">
        </div>
    </section>
    <section class="consultoria">
        <div class="consultoria-text">
            <h1 class="consultoria-h1">Nossos serviços de Consultoria</h1>
            <h2 class="consultoria-h2">Somos especialistas em cuidar do seu pet</h2>
            <p class="consultoria-p"> Oferecemos serviços de consultoria para garantir a saúde e bem-estar do seu animal de estimação. </p>
        </div>
        <div class="consultoria-img">
            <img src="Assets/consultores.png" alt="Consultores Pet Fero" class="img-consultores">
        </div>
    </section>
    <button class="ver-mais" type="button" onclick="window.location.href='consultoria.php'">Ver mais</button>
    <section class="sobre">
        <div class="sobre-text">
            <h1 class="consultoria-h1">Sobre Nós</h1>
            <div class="sobre-texto">
                <div class="sobre-p">
                    <h2>Missão</h2>
                    <p> Nossa missão é garantir a segurança e qualidade dos nossos produtos e serviços, sempre priorizando o bem-estar dos pets e a satisfação dos seus donos. </p>
                </div>
                <div class="sobre-p">
                    <h2>Visão</h2>
                    <p> Ser a empresa líder no setor pet, reconhecida pela excelência dos nossos serviços e pelo comprometimento com a saúde e felicidade dos animais de estimação.</p>
                </div>
                <div class="sobre-p">
                    <h2>Valores</h2>
                    <ul class="lista">
                        <li> <i class="fa-solid fa-paw"></i> Paixão pelos pets</li>
                        <li> <i class="fa-solid fa-shield-alt"></i> Segurança</li>
                        <li> <i class="fa-solid fa-check-circle"></i> Qualidade</li>
                        <li> <i class="fa-solid fa-smile"></i> Satisfação do cliente</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sobre-img">
            <img src="Assets/sobre.png" alt="Imagem sobre nós">
        </div>
    </section>
    <section class="nossatime">
        <h1 class="consultoria-h1">Nosso Time</h1>
        <div class="cards-consultores">
            <div class="card-time">
                <img src="Assets/consultor1.png" alt="Consultor 1" class="consultor-img">
                <p class="text">Consultor 1</p>
            </div>
            <div class="card-time">
                <img src="Assets/consultor2.png" alt="Consultor 2" class="consultor-img">
                <p class="text">Consultor 2</p>
            </div>
            <div class="card-time">
                <img src="Assets/consultor3.png" alt="Consultor 3" class="consultor-img">
                <p class="text">Consultor 3</p>
            </div>
            <div class="card-time">
                <img src="Assets/consultor4.png" alt="Consultor 4" class="consultor-img">
                <p class="text">Consultor 4</p>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p class="text">© 2023 Pet Fero. Todos os direitos reservados.</p>
        <div>
            <a href="#">Termos de Uso</a>
            <a href="#">Política de Privacidade</a>
        </div>
    </footer>
    <!-- JavaScript para a barra de progresso -->
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
</body>
</html>
