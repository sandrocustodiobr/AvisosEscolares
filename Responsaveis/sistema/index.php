<?php
$nome_modulo = "INÍCIO";
$nome_tela = "BEM VINDO!";

include_once "../class/Carregar.class.php";
include_once 'topo.php';
?>

<!-- <a id="botao_link" class='cor1' -->
<br><br>

<a class='btn btn-default btn-block'
   href="../noticias/noticias.php" 
   title="Módulo Assuntos/Matérias/Disciplinas"
   >AVISOS/NOTÍCIAS ( 
       <?php 
       $temp = new Noticia();
       echo $temp->conta();
       unset($temp);
       ?> cadastrados )</a>

<br><br>

<a class='btn btn-default btn-block'
   href="../assuntos/assuntos.php" 
   title="Módulo Assuntos/Matérias/Disciplinas"
   >ASSUNTOS/MATÉRIAS/DISCIPLINAS ( 
       <?php 
       $temp = new Assunto();
       echo $temp->conta();
       unset($temp);
       ?> cadastrados )</a>

<br><br>

<a class='btn btn-default btn-block'
   href="../cursos/cursos.php" 
   title="Módulo Cursos"
   >CURSOS ( 
       <?php 
       $temp = new Curso();
       echo $temp->conta();
       unset($temp);
       ?> cadastrados )</a>

<br><br>

<?php
include_once 'rodape.php';
?>