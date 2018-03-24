<?php
$nome_modulo = "TIPOS de NOTÍCIA";
$nome_tela = "excluindo";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if ( !isset($_GET['id']) ) {
    echo "ID inválido.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$obj = new Tiponoticia();
$obj->id=$_GET['id'];

$dados = $obj->retornarunico();
			
$saida = "<tr><td>ID</td><td>$dados->id</td></tr>
          <tr><td>Descrição</td><td>$dados->descricao</td></tr>
          <tr>
            <td>
                <a href='tiponoticia-listar.php' class='btn btn-default'>Voltar</a>
            </td>
            <td>
                <form method='GET' action='tiponoticia-del-ok.php'>
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




  