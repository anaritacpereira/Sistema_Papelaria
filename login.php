<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("php/funcoes/funcoes.php");

if(verificarLogado()){
    header("Location: php/paginas/home.php");
    exit();
}

$form = isset($_POST["login"]) && isset($_POST["senha"]);

if($form){
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if(fazerLogin($login, $senha)){
        header("Location: php/paginas/home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelaria</title>
    <!-- CSS LOCAL -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <br>
        <div class="caixas titulo">
            <br>
            SISTEMA DA PAPELARIA 2023
            <br><br>
        </div>
        <br><br>
    </header>

    <main>
        <div class="caixas">
            <h3>LOGIN</h3>
            <?php if($form): ?>
                <h4>Login inválido, tente novamente.</h4>
            <?php endif; ?>
            <form action="" method="POST">
                <input type="text" name="login" placeholder="Nome" required="required" autofocus>
                <br><br>
                <input type="password" name="senha" placeholder="Senha" required="required">
                <br><br>
                <input type="submit" value="ENTRAR">
                <br><br>
            </form>
        </div>
    </main>


    <footer class="text-center">
        ANA RITA PEREIRA © 2023
    </footer>
    
</body>
</html>