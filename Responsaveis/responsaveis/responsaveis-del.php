<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
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

$obj = new Responsavel();
$obj->id=$_GET['id'];

$dados = $obj->retornarunico();

$temp = "";
if ( $dados->admin ) { $temp = "<tr><td>Admin</td><td>Sim</td></tr>"; }

$saida = "<tr><td>ID</td><td>$dados->id</td></tr>
          <tr><td>Nome</td><td>$dados->nome</td></tr>
          <tr><td>Email</td><td>$dados->email</td></tr>
          $temp
          <tr>
            <td>
                <a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>
            </td>
            <td>
                <form method='GET' action='responsaveis-del-ok.php'>
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