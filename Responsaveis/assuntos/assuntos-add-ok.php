<?php
$nome_modulo = "ASSUNTOS";
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

$obj = new Assunto();
$obj->nomecurto=strip_tags($_POST['nomecurto']);
$obj->descricao=strip_tags($_POST['descricao']);
$obj->ano_semestre=$_POST['ano_semestre'];
$obj->id_curso=$_POST['id_curso'];
$obj->imagem=strip_tags($_POST['imagem']);

$feito = $obj->inserir();

if ($feito) {
    echo "<h3>Cadastrado com sucesso!</h3>";
} else {
    echo "<h3>ERRO AO TENTAR GRAVAR!</h3>";
}

?>

<a href='assuntos-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>