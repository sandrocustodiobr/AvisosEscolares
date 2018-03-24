<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php

if ( !isset($_POST['texto']) ) {
    echo "Dados inválidos.<br>";
    include_once '../sistema/rodape.php';
    return;
}

function DataParaGravacao($pData) {
    $data = new Data($pData);
    return $data->FormatoParaGravacao();
}

if( $_FILES ) { // Verificando se existe o envio de arquivos.
	
	if( $_FILES['imagem'] && strlen($_FILES['imagem']['name']) > 0 ) { // Verifica se o campo não está vazio.
		$dir = '../../arquivos_upload/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.
		$name = $_FILES['imagem']['name']; // Recebe o nome do arquivo.
                $agora = date('Ymd_Hi_'); // YYYY/mm/ddHHMM_
                echo "Enviando ".$name." ...";
                if( move_uploaded_file( $tmpName, $dir.$agora.$name ) )  {
                    echo "ok.<br>";
                    $nome_imagem = $agora.$name;
                } else {
                    echo "ERRO!<br>";
                    $nome_imagem = "";
                }
        }
        
        if( $_FILES['anexo'] && strlen($_FILES['anexo']['name']) > 0 ) { // Verifica se o campo não está vazio.
		$dir = '../../arquivos_upload/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['anexo']['tmp_name']; // Recebe o arquivo temporário.
		$name = $_FILES['anexo']['name']; // Recebe o nome do arquivo.
                $agora = date('Ymd_Hi_'); // YYYY/mm/ddHHMM_
                echo "Enviando ".$name." ...";
                if( move_uploaded_file( $tmpName, $dir.$agora.$name ) )  {
                    echo "ok.<br>";
                    $nome_anexo = $agora.$name;
                } else {
                    echo "ERRO!<br>";
                    $nome_anexo = "";
                }
        }
        
} else {
    echo "FILES vazio.<br>";
}

/* // DEBUG
echo DataParaGravacao($_POST['data_publicacao'])."<br>";
echo DataParaGravacao($_POST['data_evento'])    ."<br>";
echo DataParaGravacao($_POST['data_validade'])  ."<br>";
echo $_POST['id_tiponoticia']."<br>";
echo $_POST['id_assunto']    ."<br>";
echo $_POST['id_responsavel']."<br>";
echo $_POST['texto'] ."<br>";
echo $nome_imagem."<br>";
echo $nome_anexo ."<br>";
print_r($_FILES);
echo "<br>"; */

echo "Enviando...<br>";

$obj = new Noticia();
$obj->data_publicacao=$_POST['data_publicacao'];
$obj->data_evento    =$_POST['data_evento'];
$obj->data_validade  =$_POST['data_validade'];
$obj->id_tiponoticia =$_POST['id_tiponoticia'];
$obj->id_assunto     =$_POST['id_assunto'];
$obj->id_responsavel =$_POST['id_responsavel'];
$obj->titulo         =strip_tags($_POST['titulo']);
$obj->texto          =strip_tags($_POST['texto']);
$obj->imagem         =$nome_imagem;
$obj->anexo          =$nome_anexo;

$feito = $obj->inserir();

if ($feito) {
    echo "<h3>Cadastrado com sucesso!</h3>";
} else {
    echo "<h3>ERRO AO TENTAR GRAVAR!</h3>";
}

?>

<a href='noticias.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>