<?php
session_start();

// 1. BLOQUEIO: Só logado
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

$msg = "";

if(isset($_POST['enviar'])){
    $email = $_SESSION['email'];
    $arquivo = $_FILES['imagem'];
    
    // 2. VALIDAÇÃO: Só permite imagens
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    
    if(!in_array($ext, $extensoes_permitidas)){
        $msg = "Erro: Só pode enviar JPG, PNG, WEBP, GIF";
    } else {
        $nome = time() . "_" . uniqid() . "." . $ext; // nome único
        $destino = "uploads/" . $nome;
        
        if(!is_dir("uploads")) mkdir("uploads", 0777, true);
        
        if(move_uploaded_file($arquivo['tmp_name'], $destino)){
            $conn = new mysqli("localhost", "root", "", "wallpaperzone");
            $sql = "INSERT INTO imagens (email, nome_arquivo) VALUES ('$email', '$nome')";
            $conn->query($sql);
            $msg = "Upload feito com sucesso!";
        } else {
            $msg = "Erro no upload";
        }
    }
}
?>

<h2>Enviar Wallpaper</h2>
<p>Logado como: <b><?php echo $_SESSION['email']; ?></b> | <a href="logout.php">Sair</a></p>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="imagem" accept="image/*" required>
    <button name="enviar">Enviar</button>
</form>
<p><?php echo $msg; ?></p>

<a href="uploaded.php">Ver Galeria</a>