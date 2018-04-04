<?php
$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "ver";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
// SE NÃO FOR ADMIN E TIVER SIDO REDIRECIONADO PARA CÁ
//session_start(); // já foi dado no topo.php
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    $id = $_SESSION['id'];
    $o_proprio = TRUE;
} else {
    if ( !isset($_GET['id']) ) {
        echo "ID inválido.<br>";
        include_once '../sistema/rodape.php';
        return;
    } else {
        $id = $_GET['id'];
        if ( $_GET['id'] == $_SESSION['id'] ) {
            $o_proprio = TRUE;
        } else {
            $o_proprio = FALSE;
        }
    }
}

$obj = new Responsavel();
$obj->id=$id;

$dados = $obj->retornarunico();

$temp = "";
if ( $dados->admin ) { $temp = "<tr><td>Admin</td><td>Sim</td></tr>"; }

$saida = "<tr><td>ID</td><td>$dados->id</td></tr>
          <tr><td>Nome</td><td>$dados->nome</td></tr>
          <tr><td>Email</td><td>$dados->email</td></tr>
          $temp
          <tr>
            <td>";

if ($o_proprio || $_SESSION["admin"]) { $saida .= "<a href='muda_senha.php?id_mudar_senha=$dados->id' class='btn btn-warning'>Mudar Senha</a>&nbsp;&nbsp;&nbsp;"; }

$saida .= "<a href='resp-assuntos.php?id='".$dados->id."' class='btn btn-warning'>Assuntos vinculados</a>"
        . "<br><br>";
$saida .= "<a href='";
$saida .= ($_SESSION["admin"]) ? "responsaveis-listar.php" : "../sistema/index.php";
$saida .= "' class='btn btn-default'>Voltar</a>
            </td>
            <td></td>
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