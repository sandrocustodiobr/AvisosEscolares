<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "Excluindo";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if ( !isset($_GET['id']) ) {
    echo "ID inválido.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$obj = new Assunto();
$obj->id=$_GET['id'];

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
          <tr>
              <td>
                <a href='assuntos-listar.php' class='btn btn-default'>Voltar</a>
              </td>
              <td>
                <form method='GET' action='assuntos-del-ok.php'>
                  <button type='submit' name='id' value='$obj->id' class='btn btn-danger'>Excluir</button>
                </form>
              </td>
          </tr>";
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover">
        <tbody>
            <?php echo $saida;?>
        </tbody>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>