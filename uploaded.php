<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require 'conexao.php'; 



$msg = "";
if(isset($_POST['enviar'])){
    $email = $_SESSION['email'];
    $arquivo = $_FILES['imagem'];
    $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    
    $nome = time() . "_" . uniqid() . "." . $ext;
    $destino = "uploads/" . $nome;
    
    if(!is_dir("uploads")) mkdir("uploads", 0777, true);
    
    if(move_uploaded_file($arquivo['tmp_name'], $destino)){
        $stmt = $pdo->prepare("INSERT INTO imagens (email, nome_arquivo) VALUES (?, ?)");
        $stmt->execute([$email, $nome]);
        $msg = "Upload feito!";
    }
}
?>

<h2>Enviar Imagem</h2>
<p><a href="ep.php">Voltar pra EP</a></p>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="imagem" accept="image/*" required>
    <button type="submit" name="enviar">Enviar</button>
</form>

<a href="../html/index.php">Home</a>
<p style="color:green"><?php echo $msg; ?></p>