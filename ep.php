<style>

body{
    display: flex;
    flex-direction: column;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.galeria{
        display: flex;
        gap: 20px;
        padding: 20px; 
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card{
       border-bottom: 1px solid #333;
        padding: 10px;
        text-align: center;
        background: #ffffff;
        width: 50%;
    }

    .card img{
        width: 50%;
        object-fit: cover;
        border-radius: 10px;
       
    }

    @media(max-width: 720px){
        .card img{
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
    }
    .card{
       border-bottom: 1px solid #333;
        padding: 10px;
        text-align: center;
        background: #ffffff;
        width: 100%;
    }

    }

    .card a{
        background: #333;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        margin-top: 10px;
        padding: 10px;
        color: #ffffff;
    }

    @media(min-width: 720px){
        .card a{
        background: #333;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        margin-top: 10px;
        padding: 10px;
        color: #ffffff;
        width: 30%;
    }
}



</style>    

<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require 'conexao.php'; 

// LÓGICA PARA APAGAR
if(isset($_GET['apagar'])){
    $id = $_GET['apagar'];
    $stmt = $pdo->prepare("SELECT * FROM imagens WHERE id = ?");
    $stmt->execute([$id]);
    $img = $stmt->fetch();
    
    if($img && $img['email'] == $_SESSION['email']){
        unlink("uploads/" . $img['nome_arquivo']);
        $stmt = $pdo->prepare("DELETE FROM imagens WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: ep.php");
        exit();
    }
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
                <a href="../html/index.php" style = " background: #333;
    border-radius: 5px;
    padding: 10px;
    color: #ffffff;
    text-decoration: none;
    position: relative;">Home</a>
</div>

                <svg class="icon" onclick="mostrar()" width="20" height="20" viewBox="0 0 80 80" fill="#333">
                    <rect x="10" y="10" width="25" height="25" rx="3" />
                    <rect x="45" y="10" width="25" height="25" rx="3"/>
                    <rect x="10" y="45" width="25" height="25" rx="3"/>
                    <rect x="45" y="45" width="25" height="25" rx="3"/>
                </svg>
                <a href="../html/login.php">
                <svg class="icon"  viewBox="0 0 24 24" fill="#333">
                    <circle cx="12" cy="7" r="4" />
                    <path d="M5.5 21a7.5 8 0 0 1 14.5 0" />
                </svg>
                </a>
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
    <strong>Galeria-Uploaded</strong>

<script src="../js/forms.js">
</script>

<div class = "head">
    <div class = "head2">

</div>
</div>

<div class = "galeria">
<?php
$stmt = $pdo->query("SELECT * FROM imagens ORDER BY id DESC");
while($row = $stmt->fetch()){
    echo "<div class = 'card'>";
    echo "<img src='uploads/" . $row['nome_arquivo'] . "' style='width:100%'>";
    echo "<p>Por: <b>" . $row['email'] . "</b></p>";
    echo "<a href='uploads/" . $row['nome_arquivo'] . "' download>Baixar</a>";
    
    if(isset($_SESSION['email']) && $row['email'] == $_SESSION['email']){
        echo " | <a href='ep.php?apagar=" . $row['id'] . "' onclick=\"return confirm('Apagar?')\">Apagar</a>";
    }
    echo "</div>";
}
?>
</div>
</body>
</html>