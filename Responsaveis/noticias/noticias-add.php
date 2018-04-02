<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<form method="POST" action="noticias-add-ok.php" enctype="multipart/form-data">
    <div id="form_resp_add">
        
        <input class="form-control-static" name="data_publicacao" type="date" value="<?php echo date('Y-m-d');?>" readonly hidden/>

        <label>Data Evento:</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-control-static" name="data_evento"     type="date" value="<?php echo date('Y-m-d', strtotime("+30 days",strtotime(date("Y-m-d"))));?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
        
        <label>Data Validade:</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-control-static" name="data_validade"   type="date" value="<?php echo date('Y-m-d', strtotime("+180 days",strtotime(date("Y-m-d"))));?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
        
        <br><br>

        <table>
         <tbody>
             <tr><td>
<?php // MONTANDO A LISTA DE TIPONOTICIA DO SELECT
$objCurso = new Tiponoticia();
$listar=$objCurso->listar($complemento_sql);		
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
    $saida .= '<option value="'.$dados->id.'"';
    if ( $dados->id == $_GET['id_tiponoticia'] ) { 
        $saida .= " selected";
    }
    $saida .= '>'.$dados->id." - ".$dados->descricao.'</option>';
}
?>
        <label>Tipo Aviso/Notícia:</label><br>
        <select name="id_tiponoticia" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>
        
        
<?php // MONTANDO A LISTA DE ASSUNTOS DO SELECT
$complemento_sql = " where id_responsavel=".$_SESSION['id'];
$obj = new RespAssunto();
$listar=$obj->listar($complemento_sql);	
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
//    echo "<pre>";
//    echo var_dump($dados);
//    echo "</pre>";
    $saida .= '<option value="'.$dados->id_assunto.'"';
    if ( $dados->id_assunto == $item78->id_assunto ) { 
        $saida .= " selected";
    }
    $saida .= '>';
    $saida .= ($dados->id_curso > 0) ? $dados->nome_curso : '(Todos)';
    //$saida .= $dados->id_curso." - ".$dados->nome_curso;
    $saida .= " - " . $dados->nome_assunto . '</option>';
}
?>
        <label>Assunto:</label><br>
        <select name="id_assunto" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>

        <label>Responsável:</label><br>
        <select name="id_responsavel" class="form-control-static">
            <option value="<?php echo $_SESSION['id']; ?>" selected readonly><?php echo $_SESSION['nome']; ?></option>
        </select><br><br>

        </td><td>
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
        </td><td>

        <br>
        <label>TÍTULO:</label>
        <input class="form-control" name="titulo" type="text" maxlength="50">
            
        <br>
        <label>TEXTO:</label>
        <textarea class="form-control" name="texto"  type="text" rows="10" cols="30" maxlength="300"></textarea>
        
        </td></tr>
        </tbody>
        </table>
        
        <label>Imagem:</label>
        <input name="imagem" type="file" maxlength="150"/><br>
        
        <label>Anexo:</label>
        <input name="anexo"  type="file" maxlength="150"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='noticias.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>