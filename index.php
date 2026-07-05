<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WallPaperZone</title>
    <link rel="stylesheet" href="../css/estilo.css?v=1">
</head>
<body>
    <nav>
   
        <div class="title"><h1>WallPaperZone</h1></div>
        <div class="div1">
            <div class="nav-div-1"><span>WPZ</span></div>
            <div class="nav-div-2">

            <div class ="uplo">
<a href="../php/uploaded.php" style = " background: #333;
    border-radius: 5px;
    padding: 10px;
    color: #ffffff;
    text-decoration: none;
    position: relative;">upload</a>
                <a href="../php/ep.php" style = " background: #333;
    border-radius: 5px;
    padding: 10px;
    color: #ffffff;
    text-decoration: none;
    position: relative;">uploaded</a>
</div>

                <svg class="icon" onclick="mostrar()" width="20" height="20" viewBox="0 0 80 80" fill="#333">
                    <rect x="10" y="10" width="25" height="25" rx="3" />
                    <rect x="45" y="10" width="25" height="25" rx="3"/>
                    <rect x="10" y="45" width="25" height="25" rx="3"/>
                    <rect x="45" y="45" width="25" height="25" rx="3"/>
                </svg>
                <svg class="icon" onclick="ir()" viewBox="0 0 24 24" fill="#333">
                    <circle cx="12" cy="7" r="4" />
                    <path d="M5.5 21a7.5 8 0 0 1 14.5 0" />
                </svg>
            </div>
        </div>
    </nav>

    <header>
        <div class="slide"></div>
        <div class="slide"></div>
        <div class="slide"></div>
        <div class="overlay"> <div id="aparecer" style="display: none;">
            <button onclick="fechar()">x</button>
            <ul>
                <li><a href ="">Tudo</a></li>
            <li><a href ="">Natureza</a></li>
               <li><a href ="">Animais</a></li>
               <li><a href ="">Paisagem</a></li>
               <li><a href ="">Cidades</a></li>
               <li><a href ="">Alimento</a></li>
               <li><a href ="">Anime</a></li>
               <li><a href ="">Desporto</a></li>
               <li><a href ="">Animação</a></li>
               <li><a href ="">Cartoon</a></li>
               <li><a href ="">Dark</a></li>
               <li><a href ="">Tecnologia</a></li>
               <li><a href ="">Personagens</a></li>
               <li><a href ="">IA</a></li>
               <li><a href ="">Musica</a></li>
               <li><a href ="">Veiculos</a></li>
               <li><a href ="">Arte</a></li>
               <li><a href ="">Quotes</a></li> 
               <li><a href ="">Datas</a></li>
               <li><a href ="">Astronomia</a></li> 
               <li><a href ="">Papel de parede</a></li>
            </ul>
        </div></div>

       

        <div class="header-content">
        <h1>Bem vindo ao WallPaperZone</h1>
        <h2>Faça o download de imagens</h2>
        <p>100% Gratuito</p>
        </div>
       
    </header>
    <strong>Galeria</strong>

    <?php
    include '../php/galeria.php';
    ?>

<script src="../js/forms.js">
</script>

</body>
</html>