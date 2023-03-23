<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("../funcoes/funcoes.php");

if(!verificarLogado()){
    header("Location: ../login.php");
    exit();
}

$lista = selectSQL("SELECT * FROM papelaria ORDER BY id");

$form = isset($_GET["vender"]);

if ($form) {
    $vender = $_GET["vender"];

    $papelaria = selectSQLUnico("SELECT * FROM papelaria WHERE id=$vender");

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
                                <a class="nav-link menu" aria-current="page" href="editar.php">EDITAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="apagar.php">APAGAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu active" aria-current="page" href="vendas.php">REGISTAR VENDAS</a>
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
            <?php if ($form):?>
                <div class="row caixas">
                    <div class="col-12 bv_titulo p-4">
                        REGISTO DE VENDAS
                        <table class="mx-auto w-100">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>PREÇO</th>
                                <th>QUANTIDADE</th>
                                <th>ACÇÃO</th>
                            </tr>
                            <tr>
                                <td><?= $papelaria["id"];?></td>
                                <td><?= $papelaria["nome"];?></td>
                                <td><?= $papelaria["preco"];?></td>
                                <td><?= $papelaria["quantidade"];?></td>
                                <form action="vendas_saida.php">
                                    <td>
                                        <input type="hidden" name="id" value="<?= $papelaria["id"];?>">
                                        <input class="text-center" type="number" name="qnt_vendas" max="<?= $papelaria["quantidade"];?>" step="1" placeholder="Total" required="required">
                                    </td>
                            </tr>
                        </table> 
                        <br>
                        <input type="submit" value="VENDER" class="botao button">
                        </form>
                    </div>
                </div>
                            

                        <?php else:?>
                            <div class="row caixas">
                                <div class="col-12 bv_titulo p-4">
                                    REGISTO DE VENDAS
                                    <br><br>
                                    <table class="mx-auto w-100">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOME</th>
                                        <th>PREÇO</th>
                                        <th>QUANTIDADE</th>
                                        <th>acção</th>
                                    </tr>
                                    <?php foreach ($lista as $l):?>
                                        <tr>
                                            <td><?= $l["id"];?></td>
                                            <td><?= $l["nome"];?></td>
                                            <td><?= $l["preco"];?></td>
                                            <td><?= $l["quantidade"];?></td>
                                            <form action="vendas.php">
                                                <?php if($l["quantidade"]==0): ?>
                                                    <td>
                                                        <button class="botao edit" name="vender" value="<?= $l["id"];?>" disabled >VENDER</button>
                                                    </td>
                                                <?php else: ?>
                                                    <td>
                                                        <a href="vendas.php">
                                                            <button class="botao edit" name="vender" value="<?= $l["id"];?>">VENDER</button>
                                                        </a>
                                                    </td>
                                                <?php endif; ?> 
                                            </form>
                                        </tr>
                                    <?php endforeach;?>
                                    </table>        
                                </div>
                            </div>
            <?php endif;?>
    </main>

    <footer class="text-center">
        ANA RITA PEREIRA © 2023
    </footer>
    
<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   
</body>
</html>