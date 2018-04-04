<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php

echo "Enviando...<br>";

if ( !isset($_POST['nome']) ) {
    echo "Dados inválidos.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$objResp = new Responsavel();
$objResp->nome =strip_tags($_POST['nome']);
$objResp->admin=strip_tags($_POST['admin']);
$objResp->email=strip_tags($_POST['email']);
$objResp->setSenha($_POST['senha']);

$inserido = $objResp->Inserir();

if ($inserido) {
    echo "<h3>Novo responsável cadastrado com sucesso!</h3>";
} else {
    echo "<h3>ERRO AO TENTAR GRAVAR!</h3>";
}

//$objResp->MostraDados();

//echo "Fim.";

?>

<a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>