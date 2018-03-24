<?php
$nome_modulo = "TIPOS de NOTÍCIA";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php

if ( !isset($_POST['descricao']) ) {
    echo "Dados inválidos.<br>";
    include_once '../sistema/rodape.php';
    return;
}

echo "Enviando...<br>";

$obj = new Tiponoticia();
$obj->descricao=strip_tags($_POST['descricao']);

$feito = $obj->inserir();

if ($feito) {
    echo "<h3>Cadastrado com sucesso!</h3>";
} else {
    echo "<h3>ERRO AO TENTAR GRAVAR!</h3>";
}

?>

<a href='tiponoticia-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>