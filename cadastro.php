<?php
session_start();
require '../php/conexao.php';

if($_POST){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    //verificar se o email ja existe

    $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->execute([$email]);

    if($check->rowCount() > 0){
        $erro = "Este email ja está cadastrado";
    }else{
        try{
            $stmt= $pdo->prepare("INSERT INTO usuarios (nome, email, senha)  VALUES (?,?,?)");
            $stmt->execute([$nome, $email, $senha]);
            $_SESSION['msg'] = "Cadastro feito com sucesso!";
            header("Location: login.php");
            exit;
        }catch(PDOException $e){
            $erro = "erro ao cadastrar. Tente de novo.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container-principal-2">
       
        <div class="login-div">
            <div class="form-div">
                <h1>WallPaperZone</h1>
                <div class="icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="rgb(34, 34, 58)"  >
                        <circle cx="12" cy="9" r="4"/>
                        <path d="M5.5 21a7.5 8.5 0 0 1 14 0"/>
                    </svg>
                 </div>
                 <?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
    <?php if(isset($_SESSION['msg'])) {echo "<p style='color:green'>".$_SESSION['msg']."</p>"; unset($_SESSION['msg']);} ?>


                <form action="cadastro.php" method="POST">
                   
                    <input type="text" name="nome" placeholder="Nome" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button onclick="message()" type="submit">Cadastrar-se</button>
                    <a href="login.php">Login</a>
                </form>
            </div>

        </div>
        
    </div>

   </body>
</html>