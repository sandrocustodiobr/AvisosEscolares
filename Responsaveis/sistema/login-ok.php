<?php
session_start();
include_once "../class/Carregar.class.php";

$objUsuario = new Responsavel();
$objUsuario->email = strip_tags($_POST['email']);
$objUsuario->setSenha($_POST['senha']);
$login = $objUsuario->login();
if ($login) {
    if ($login->admin && $_POST['admin'] == 'on') {
        $_SESSION["admin"] = $login->admin;
    } else {
        $_SESSION['admin'] = false;
    }
    $_SESSION["logado"] = true;
    $_SESSION["id"] = $login->id;
    $_SESSION["nome"] = $login->name;
    //echo "Admin: ".$login->id." / Nome: ".$login->nome." / Email: ".$login->email;
    header("location:../sistema/index.php");
} else {
    header("location:../sistema/login.php?m=negado");
}
?>
