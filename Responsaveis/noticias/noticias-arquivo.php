<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "arquivos";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"])) {
    $obj3 = new Noticia();
    $obj3->id = $_GET["id"];
    $item78 = $obj3->retornarunico();
} else {
    header("ID não informado.");
}

if (isset($_GET["tipo"]) && ( $_GET["tipo"] == 'imagem' || $_GET["tipo"] == 'anexo' ) ) {
    $obj3 = new Noticia();
    $obj3->id = $_GET["id"];
    $item78 = $obj3->retornarunico();
    //$item78->MostraDados();
    $select_tiponoticia = $item78->id_tiponoticia;
} else {
    header("Tipo não informado.");
}

if ( $_GET["tipo"] == 'imagem' ) {
    $label = "Imagem";
    $arquivo = $item78->imagem;
} else {
    $label = "Anexo";
    $arquivo = $item78->anexo;
}

?>

<form method="POST" action="noticias-arquivo-upok.php" enctype="multipart/form-data">
    <div id="form_resp_add">
        
        <label><?php echo $label;?>:</label><br>
        <a href="<?php echo "${pasta_upload}$arquivo"; ?>" target="_blank"><?php echo $arquivo; ?></a> &nbsp;&nbsp;
        <input name="imagem" type="file" maxlength="150"/><br>
        
        <input mane="id" type="number" value="<?php echo $item78->id;?>" hidden>
        <input mane="tipo" type="text" value="<?php echo $_GET["tipo"];?>" hidden>
        
        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <a href='noticias-arquivo-delok.php' class='btn btn-danger'>Eliminar <?php echo $label; ?></a>
        <a href='noticias.php' class='btn btn-default'>Voltar</a>
    </div>
</form>        

<?php
include_once '../sistema/rodape.php';
?>