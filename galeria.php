<style>


body{
    overflow-x: hidden;
}
    .galeria{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px; 
    }

    .card{
       border-bottom: 1px solid #333;
        padding: 10px;
        text-align: center;
        background: #ffffff;
       

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
<link rel="stylesheet" href="../css/estilo.css">
</div class ="galeria">
<?php


$pasta = "../Uploads/"; // pasta onde ficam as imagens

// Pega todos os arquivos da pasta
$arquivos = scandir($pasta);

// Filtra só imagens
$extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

foreach($arquivos as $arquivo){
    // Pega a extensão do arquivo
    $ext = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
    
    // Se for imagem, mostra
    if(in_array($ext, $extensoes_permitidas)){
        echo "<div  class = 'card'>";
        
        echo "<img src='".$pasta.$arquivo."' width='200' style='border-radius:8px;'><br>"; // mostra imagem
        
        echo "<p><b>".$arquivo."</b></p>"; // nome do arquivo
        
        echo "<a href='".$pasta.$arquivo."' download '> Baixar</a>"; // botão
        
        echo "</div>";
    }
}
?>
</div>


