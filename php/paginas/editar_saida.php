<?php

require_once("../funcoes/base_dados.php");


$form = isset($_GET["id"]);

if ($form){
    $id = $_GET["id"];
    $papelaria = selectSQLUnico("SELECT * FROM papelaria WHERE id = '$id'");
}



?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelaria</title>
    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS LOCAL -->
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body class="container-fluid">
    <header>
            <div class="row caixas mt-3">
                <div class="col-12 text-center titulo p-3 mt-4 mb-3">SISTEMA DA PAPELARIA 2023</div>
                <nav class="col-12 navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse justify-content-center">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="home.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="listar.php">LISTAR PRODUTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="pesquisar.php">PESQUISAR CÓDIGO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="registar.php">REGISTAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu active" aria-current="page" href="editar.php">EDITAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="apagar.php">APAGAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="vendas.php">REGISTAR VENDAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="logoff.php">SAIR</a>
                            </li>
                            </ul>
                        </div>
                </nav>
            </div>
    </header>

    <br><br>

    <main>
            <div class="row caixas">
                <div class="col-12 bv_titulo p-4">
                    EDITAR PRODUTO (<?= $id; ?>)
                    <br><br>
                    <form action="editar.php" >
                        <input type="text" name="nome" value="<?= $papelaria["nome"]; ?>" required="required" autofocus placeholder="Nome">
                        <br><br>
                        <input type="number" name="preco"  value="<?= $papelaria["preco"]; ?>" step="0.01" min="0" required="required" placeholder="Preco">
                        <br><br>
                        <input type="number" name="quantidade" value="<?= $papelaria["quantidade"]; ?>" step="1" min="1" required="required" placeholder="Quantidade">
                        <br><br>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="submit" value="Editar">
                    </form>
                </div>
            </div>
    </main>

    <footer class="text-center">
        ANA RITA PEREIRA © 2023
    </footer>
            

<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>