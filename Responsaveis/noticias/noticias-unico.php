<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "ver";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if ( !isset($_GET['id']) ) {
    echo "ID inválido.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$obj = new Noticia();
$obj->id=$_GET['id'];

$dados = $obj->retornarunico();

//echo "<pre>";
//var_dump($dados);
//echo "</pre>";
$temp = "";
if ( $dados->admin ) { $temp = "<tr><td>Admin</td><td>Sim</td></tr>"; }

$saida = "<tr><td>ID</td>           <td>$dados->id</td></tr>
          <tr><td>Publicado em</td> <td>$dados->data_publicacao</td></tr>
          <tr><td>Data Evento</td>  <td>$dados->data_evento</td></tr>
          <tr><td>Validade</td>     <td>$dados->data_validade</td></tr>
          <tr><td>Tipo Notícia</td> <td>$dados->tiponoticia</td></tr>
          <tr><td>Curso</td>        <td>";
$saida .= ($dados->id_curso > 0) ? $dados->nome_curso : "(Todos)";
$saida .= "</td></tr>
          <tr><td>Assunto/Matéria</td><td>$dados->nome_assunto</td></tr>
          <tr><td>Responsável</td>  <td>$dados->id_responsavel-$dados->nome_responsavel</td></tr>
          <tr><td>TEXTO</td>        <td>$dados->texto</td></tr>
          <tr><td>Imagem</td>       <td>";

if ( strlen($dados->imagem) > 0 ) { $saida .= "<img src='../../arquivos_upload/$dados->imagem' width=600>"; }

$saida .= "</td></tr>
          <tr><td>Anexo</td>        <td>";

if ( strlen($dados->anexo) > 0 ) { $saida .= "<a href='../../arquivos_upload/$dados->anexo' target='_blank'>$dados->anexo</a>"; }

$saida .= "</td></tr>
          $temp
          <tr>
            <td>
                <a href='noticias.php' class='btn btn-default'>Voltar</a>
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