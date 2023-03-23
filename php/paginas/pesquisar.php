<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../funcoes/base_dados.php");
require_once("../funcoes/funcoes.php");

if(!verificarLogado()){
    header("Location: ../login.php");
    exit();
}

$form = isset($_GET["id"]);
$id;

if($form){

    $id = intval($_GET["id"]);
    $papelaria = selectSQLUnico("SELECT * FROM papelaria WHERE id=$id");

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
                                <a class="nav-link menu active" aria-current="page" href="pesquisar.php">PESQUISAR CÓDIGO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="registar.php">REGISTAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="editar.php">EDITAR PRODUTO</a>
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
                    PESQUISAR
                    <br><br>
                    <form action="">
                        <input type="text" name="id" placeholder="Código" min="0">
                        <br><br>
                        <input type="submit" value="PESQUISAR">
                    </form>
                    <br>
                    <?php if($form): ?>
                        <a href="pesquisar.php">
                            <button>RESET</button>
                        </a>
                        <br><br>
                        <?php if(!empty($papelaria)): ?>
                            <table class="mx-auto w-100">
                                <tr>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>PREÇO</th>
                                    <th>QUANTIDADE</th>
                                </tr>

                                <tr>
                                    <td><?= $papelaria["id"]; ?></td>
                                    <td><?= $papelaria["nome"]; ?></td>
                                    <td><?= number_format($papelaria["preco"], 2); ?>€</td>
                                    <td><?= $papelaria["quantidade"]; ?></td>
                                </tr>
                        <?php else: ?>
                            <div class="col-12">
                                Não foi encontrado nenhum produto com o código (<?= $id; ?>).
                                <br><br>
                            </div>
                        <?php endif; ?>
                        </table>
                    <?php endif; ?>                 
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