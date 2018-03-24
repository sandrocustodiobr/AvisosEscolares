<?php
$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "muda senha";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
// SE NÃO FOR ADMIN E TIVER SIDO REDIRECIONADO PARA CÁ
//session_start(); // já foi dado no topo.php
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && $_SESSION['admin'] ){
    $o_proprio = TRUE;
    $id = $_SESSION['id'];
} else {
    $o_proprio = FALSE;
}

echo "(EM DESENVOLVIMENTO)";
return;










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

if ($o_proprio) { $saida .= "(MUDANÇA DE SENHA EM DESENVOLVIMENTO)<br><br>"; }

$saida .=      "<a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>
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