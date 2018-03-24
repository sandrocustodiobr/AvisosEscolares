<?php
$nome_modulo = "CURSOS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php

if ( !isset($_POST['nomecurto']) ) {
    echo "Dados inválidos.<br>";
    include_once '../sistema/rodape.php';
    return;
}

echo "Enviando...<br>";

$obj = new Curso();
$obj->nomecurto=strip_tags($_POST['nomecurto']);
$obj->nomelongo=strip_tags($_POST['nomelongo']);

$feito = $obj->inserir();

if ($feito) {
    echo "<h3>Cadastrado com sucesso!</h3>";
} else {
    echo "<h3>ERRO AO TENTAR GRAVAR!</h3>";
}

?>

<a href='cursos-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>