<?php

require_once("base_dados.php");

date_default_timezone_set("Europe/Lisbon");

function fazerLogin($login, $senha){
    $resultado = selectSQLUnico("SELECT * FROM administradores WHERE login='$login' AND senha='$senha';");
    
    if(!empty($resultado)){
        session_start();
        $_SESSION["login"] = $resultado["login"];
        $_SESSION["nome"] = $resultado["nome"];
        $_SESSION["data_ultimo_acesso"] = $resultado["data_ultimo_acesso"];

        $id = $resultado["id"];
        $data = date("H:i:s - d/m/Y");

        iduSQL("UPDATE administradores SET data_ultimo_acesso='$data' WHERE id=$id");

        return true;
    }
    else{
        return false;
    }
    
}

function verificarLogado(){
    session_start();
    $sessao = isset($_SESSION["login"]) && isset($_SESSION["nome"]);
    return $sessao;
}

function getCliente($id){
    return selectSQLUnico("SELECT nome, telefone FROM clientes WHERE id=$id");
}

?>