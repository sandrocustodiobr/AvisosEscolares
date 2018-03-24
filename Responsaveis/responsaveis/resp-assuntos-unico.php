<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "ASSUNTOS";
$nome_tela = "ver/consultar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if ( !isset($_GET['id_assunto']) || !isset($_GET['id_responsavel']) || !isset($_GET['nome_responsavel'])) {
    echo "ID assunto inválido.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$obj = new Assunto();
$obj->id=$_GET['id_assunto'];

$dados = $obj->retornarunico();

// DEBUG
//echo "ID:".$obj->id."...";
//$obj->MostraDados();
			
$saida = "<tr><td>ID:</td>          <td>$dados->id</td></tr>
          <tr><td>Nome curto:</td>  <td>$dados->nomecurto</td></tr>
          <tr><td>Descrição:</td>   <td>$dados->descricao</td></tr>
          <tr><td>Ano/Semestre:</td><td>$dados->ano_semestre</td></tr>
          <tr><td>Curso:</td>       <td>$dados->id_curso - $dados->nome_curso</td></tr>
          <tr><td>Imagem:</td>      <td>$dados->imagem</td></tr>
          <tr><td><a href='resp-assuntos.php?id=".$_GET['id_responsavel']."' class='btn btn-default'>Voltar</a></td><td></td></tr>";
?>

<div class="content table-responsive table-full-width">
    <h3>Responsável: <?php echo $_GET['id_responsavel']." - ".$_GET['nome_responsavel'];?></h3>
    <table class="table table-hover">
        <tbody>
            <?php echo $saida;?>
        </tbody>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>