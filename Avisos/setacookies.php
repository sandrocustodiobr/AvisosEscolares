<?php

$nome_tela = "cookiesok";
include_once "../Responsaveis/class/Carregar.class.php";

if (isset($_GET['curso'])) {
    setcookie('curso', $_GET['curso']);
    $curso = $_GET['curso'];
    
    // pegando nome do curso
    $objCurso = new Curso();
    $objCurso->id = $curso;
    $dadosCurso = $objCurso->retornarunico();
    $nome_curso = $dadosCurso->nomecurto;
}

if (isset($_GET['ano_sem'])) {
    setcookie('ano_sem', $_GET['ano_sem']);
    $ano_sem = $_GET['ano_sem'];
}

header('location:index.php');
exit;
// NÃO CARREGA MAIS O HTML DESTE ARQUIVO ...............

?>
