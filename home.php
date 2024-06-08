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
</head>
<body>
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
          display:block;
           justify-content:space-between;
           margin-top:-30px;
        }
        .servicos h2{
            margin:25px;
            color:var(--cor2);
        }
      
        .servicos-i{
            display:flex;
            margin:auto;
            justify-content:space-between;
        }
        .img-servicos{
            border-radius:30px;
        }
        .svg{
            margin:auto;
            cursor:pointer;
            margin-top:-10px;
            margin-left:90px;
            justify-content:justify;
        }
        h3{
            color:var(--cor3);
            left:-810px;
            top:-30px;
            font-weight:500;
            position:relative;
            padding:20px;
            text-align:justify;
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
        .footer2 img{
            top:70px;
            position: relative;
        }
        .btn-agendar{
            background:#fff;
            color:var(--cor1);
        }
        .servicos-content {
    display: none;
    padding: 10px;
}

.servicos-header {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.servicos-header svg {
    transition: transform 0.3s;
}

.servicos-header.active svg {
    transform: rotate(90deg);
}

.servicos-header h3 {
    margin-left: 10px;
}
p{
    text-align:center;
}
    </style>
 <?php  ?>
    <header>
        <img src="logo.png" alt="logotipo" class="logo" width="89" height="60">
        <nav>
            <ul>
                <li>
                    <a href="#" class="link-active">Página Inicial</a>
                </li>
                <li>
                    <a href="#about">Sobre Nós</a>
                </li>
                <li>
                    <a href="#services">Serviços</a>
                </li>
                <li>
                    <a href="#contact">Fale Connosco</a>
                </li>
            </ul>
        </nav>
        <button id="agendar">Agendar Consultoria</button>
    </header>
    <main>
    <div class="landing">
        <div class="landing-img">
            <img width="380" height="380" src="home.png" alt="consultora" class="consultora-img">
        </div>
        <div class="landing-text">
            <h1 class="landing-h1">Ter uma idéia é certo <br> consultar é correcto</h1>
            <br><br>
            <p class="landing-p">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.<br>
            Aperiam diandae ducimus omnis nesciunt, nihil, maxime.
            </p>
            <a href="agendar.php">
            <button  class="btn-agendar">Agendar</button>
            </a>
        </div>
    </div>
    </main>
    <div class="consultoria">
        <h2>Consultorias</h2>
        <div class="consultoria-text">
            <h1 class="consultoria-h1">Ter uma idéia é certo <br>
        consultar é correcto</h1>
        <p class="consultoria-p">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
            pedit quasi,consectetur eos, dolores modi at ad minima raesentium <br>
            optio illum dolores modi at ad minima raesentium.
        </p>
        <button class="ver-mais">Ver mais</button>
    </div>
    <div class="consultoria-img">
        <img src="home1.png" alt="Consultores" class="img-consultores" width="380" height="380">
     </div>
    </div>
    <div class="lista">
        <div class="lista-g">
            <li>* Gestão de Pessoas</li>
            <li>* Gestão de RH</li>
            <li>* Gestão Empresarial</li>
            <li>* Gestão de Projectos</li>
            <li>* E-Commerce</li>
        </div>
        <div class="lista-e">
            <li>* Engenharia Informática</li>
            <li>* Engenharia Eléctrica</li>
            <li>* Engenharia Mecânica</li>
            <li>* Engenharia Literária</li>
            <li>* Marketing Digital</li>
        </div>
    </div>
    <div class="sobre" id="about">
        <div class="sobre-text">
        <h2>Sobre Nós</h2>
    </div>
    <div class="sobre-img">
        <img src="home3.png" alt="Consultores" class="img-consultores" width="580" height="200">
    <div class="sobre-texto">
    <div class="sobre-text">
        <p class="sobre-p">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
            optio illum dolores modi at ad minima raesentium.
        </p>
    </div>
        <div class="sobre-text1">
        <p class="sobre-p1">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
            optio illum dolores modi at ad minima raesentium.
        </p>
        </div>
        </div>
     </div>
    </div>
    <div class="servicos" id="services">
        <h2>Serviços</h2>

        <div class="servicos-item">
            <div class="servicos-header">
    <svg class="svg" width="20px" height="20px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<path d="M9.644 8.5l-6.854 6.854-0.707-0.707 6.146-6.147-6.146-6.146 0.707-0.708 6.854 6.854zM7.634 1.646l-0.707 0.708 6.146 6.146-6.146 6.146 0.707 0.707 6.853-6.853-6.853-6.854z" fill="#000000" />
</svg>
    <h3>Implementação Geral</h3>
    </div>
    <div class="servicos-content">
        <p>Conteúdo Implementação Geral.</p>
    </div>
</div>
<div class="servicos-item">
    <div class="servicos-header">
    <svg class="svg" width="20px" height="20px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<path d="M9.644 8.5l-6.854 6.854-0.707-0.707 6.146-6.147-6.146-6.146 0.707-0.708 6.854 6.854zM7.634 1.646l-0.707 0.708 6.146 6.146-6.146 6.146 0.707 0.707 6.853-6.853-6.853-6.854z" fill="#000000" />
</svg>
    <h3>Estratégica de Marketing</h3>
    </div>
    <div class="servicos-content">
        <p>Conteúdo sssssssssssssssssss</p>
    </div>
</div>
<div class="servicos-item">
    <div class="servicos-header">
    <svg class="svg" width="20px" height="20px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<path d="M9.644 8.5l-6.854 6.854-0.707-0.707 6.146-6.147-6.146-6.146 0.707-0.708 6.854 6.854zM7.634 1.646l-0.707 0.708 6.146 6.146-6.146 6.146 0.707 0.707 6.853-6.853-6.853-6.854z" fill="#000000" />
</svg>
    <h3>Estratégica de Negócio</h3>
</div>
    <div class="servicos-content">
        <p>Conteúdo sobre Estratégia de Negócio</p>
    </div>
</div>
<div class="servicos-item">
    <div class="servicos-header">
        <svg class="svg" width="20px" height="20px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path d="M9.644 8.5l-6.854 6.854-0.707-0.707 6.146-6.147-6.146-6.146 0.707-0.708 6.854 6.854zM7.634 1.646l-0.707 0.708 6.146 6.146-6.146 6.146 0.707 0.707 6.853-6.853-6.853-6.854z" fill="#000000" />
        </svg>
        <h3>Planos e Análises</h3>
    </div>
    <div class="servicos-content">
        <p>Conteúdo sobre Estratégia de Negócio</p>
    </div>
</div>
    </div>
    <div class="servicos-i">
        <img src="home4.png" alt="image" class="img-servicos">
    </div>


<div class="contacto" id="contact">
    <div class="contacto-h1">
    <h2>Fale Connosco</h2>
    </div>
     
    <div class="prim">
    <div class="nome">
        <label>Primeiro Nome</label>
        <br>
        <input type="text" placeholder="Primeiro Nome">
    </div>
    <div class="nome1">
        <label for="">Último Nome</label>
        <br>
        <input type="text" placeholder="Último Nome">
    </div>

    <div class="nome2">
    <label for="">Número de Telefone</label><br>
    <input type="number" class="form-input" placeholder="Telefone">
    </div>

    <div class="nome3">
    <label for="">Sua Mensagem</label><br>
    <textarea  placeholder="Escreva aqui a sua mensagem!"></textarea>

    <input type="submit" value="Enviar">
    </div>
        <img src="contact.png" class="img-contacto" alt="contato">
    </div>
</div>
        <footer>
            <div class="footer1">
                <div class="footer2">
                    <div class="footer2-1">
                    <img src="logo1.png" alt="" width="100" height="80">
                </div>
                <div class="footer-2-2">
                    <img width="30" src="linkedin-1.png" alt="linkedin">
                    <img width="30" src="facebook.png" alt="facebook">
                    <img width="30" src="instagram.png" alt="instagram">
                </div>
                </div>
                <div class="footer3">
                    <h1>Nosso Site</h1>
                    <li> <a href="#agendar">Página Inicial</a></li>
                    <li><a href="#about">Sobre Nós</a></li>
                    <li><a href="#services">Serviços</a></li>
                    <li><a href="#contact">Fale Connosco</a></li>
                </div>
                <div class="footer4">
                    <h1>Outras Contas</h1>
                    <li>www.linkedin</li>
                    <li>www.linkedin</li>
                    <li>www.linkedin</li>
                    <li>www.linkedin</li>
                </div>
                <div class="footer5">
                    <h1>Contactos</h1>
                    <li>Luanda / Angola</li>
                    <li>953352490 / 928549260</li>
                    <li>angoconsultIpil@gmail.com</li>
                    <a href="agendar.php">
                        <button id="btn-agendar" class="btn-agendar">Agendar</button>
                        </a>
                    </div>
            </div>
        </footer>
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

            const btnAgendar = document.getElementById("btn-agendar")
            btnAgendar.addEventListener("click",()=>{
                location.href = "agendar.php"
            })
           const agendar = document.getElementById("agendar")
           agendar.addEventListener("click",()=>{
            location.href = "agendar.php"
           }) 
        </script>

<script>
document.querySelectorAll('.servicos-header').forEach(header => {
    header.addEventListener('click', function() {

        this.classList.toggle('active');
        
        const content = this.nextElementSibling;
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
    });
});
</script>

</body>
</html>