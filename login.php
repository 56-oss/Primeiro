<?php
session_start();
require '../php/conexao.php';

//se ja esta logado manda directo pro home



if($_POST){
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    //Busca usuario no banco

    $stmt = $pdo->prepare("SELECT id,nome,email, senha FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    //verifica se existe e se a senha bate

    if($user && password_verify($senha, $user['senha'])){
        //login ok - cria sessao

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];


        //redireciona pro home

        header("Location: index.php");
        exit;
    }else{
        $erro = "Email ou senha incorrectos!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>


    <div class="container-principal-2">
        <a href="index.php">Home</a>
        <div class="login-div">
        <div class="overlay"></div>
            <div class="form-div">
                <h1>WallPaperZone</h1>
                <div class="icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="rgb(34, 34, 58)"  >
                        <circle cx="12" cy="9" r="4"/>
                        <path d="M5.5 21a7.5 8.5 0 0 1 14 0"/>
                    </svg>
                 </div>

                 <?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
                 <?php if(isset($_SESSION['msg'])){ echo "<p style='color:green'>".$_SESSION['msg']."</p>"; unset($_SESSION['msg']); }?>

                <form action="" method="POST">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button type="submit">Login</button>
                    <a href="cadastro.php">Cadastrar-se</a>
                </form>
            </div>

        </div>
        
    </div>

</body>
</html>