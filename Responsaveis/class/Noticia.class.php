<?php

class Noticia {
    private $id;
    private $data_publicacao;
    private $data_evento;
    private $data_validade;
    private $id_tiponoticia;
    private $id_assunto;
    private $id_responsavel;
    private $texto;
    private $titulo;
    private $imagem;
    private $anexo;

    private $nome_assunto;
    private $nome_curso;
    private $nome_responsavel;
    private $tiponoticia;
    private $ano_semestre;

    private $tabela;
    private $link;
    
    private $objTemp;
    private $debug=FALSE;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', 'root', 'AvisosEscolares')
            or die ("<h3>Erro ao conectar ao servidor...</h3>");        
        $this->tabela = "Noticia";
        if ($this->debug) { echo "construct..."; }
        $this->id = 0;
        $this->data_publicacao = '';
        $this->data_evento = '';
        $this->data_validade = '';
        $this->id_tiponoticia = 0;
        $this->id_assunto = 0;
        $this->id_responsavel = 0;
        $this->titulo = '';
        $this->texto = '';
        $this->imagem = '';
        $this->anexo = '';
    }
    public function __destruct() {
        unset($this->link);
        if ($this->debug) { echo "destruct..."; }
    }

    public function __get($key) {
        return $this->$key;
        if ($this->debug) { echo "Pegando $key..."; }
    }

    //método de retorno de valores do objeto 
    public function __set($key, $value) {
        $this->$key = $value;
        if ($this->debug) { echo "Definindo $key..."; }
    }

    public function inserir() {
        $sql = "INSERT INTO $this->tabela ("
            . "data_publicacao,"
            . "data_evento,"
            . "data_validade,"
            . "id_tiponoticia,"
            . "id_assunto,"
            . "id_responsavel,"
            . "titulo,"
            . "texto,"
            . "imagem,"
            . "anexo)"
            . "values ("
            . "'$this->data_publicacao',"
            . "'$this->data_evento',"
            . "'$this->data_validade',"
            . "$this->id_tiponoticia,"
            . "$this->id_assunto,"
            . "$this->id_responsavel,"
            . "'$this->titulo',"
            . "'$this->texto',"
            . "'$this->imagem',"
            . "'$this->anexo')";
        $retorno = mysqli_query($this->link, $sql);

        if ($this->debug) { echo " Query: $sql... Ret: $retorno..."; }
        return $retorno;
    }
    
    /*public function MostraDados() {
        echo "<br>".$this->id."<br>".$this->id_responsavel."<br>".$this->id_assunto."<br>".$this->tabela."<br>".$this->admin."<br>";
    }*/
    
    public function listar($complemento = "") {
        $sql = "SELECT $this->tabela.*,"
                . " Assunto.nomecurto as nome_assunto,"
                . " Assunto.ano_semestre as ano_semestre,"
                . " Curso.nomecurto as nome_curso,"
                . " Responsavel.nome as nome_responsavel,"
                . " TipoNoticia.descricao as tiponoticia"
                . " FROM $this->tabela "
                . "INNER JOIN Assunto     ON Assunto.id      = $this->tabela.id_assunto "
                . "INNER JOIN Curso       ON Assunto.id_curso= Curso.id "
                . "INNER JOIN Responsavel ON Responsavel.id  = $this->tabela.id_responsavel "
                . "INNER JOIN TipoNoticia ON TipoNoticia.id  = $this->tabela.id_tiponoticia "
                . $complemento
                . " ORDER BY $this->tabela.data_evento DESC, $this->tabela.data_publicacao DESC";
        if ($this->debug) { echo "<br>$sql<br>"; }

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;
        
        while ($reg = mysqli_fetch_assoc($resultado)) {
            
            $obj = new Noticia();
            $obj->id = $reg["id"];
            $obj->data_publicacao = $reg['data_publicacao'];
            $obj->data_evento = $reg['data_evento'];
            $obj->data_validade = $reg['data_validade'];
            $obj->id_tiponoticia = $reg['id_tiponoticia'];
            $obj->id_assunto = $reg['id_assunto'];
            $obj->id_responsavel = $reg['id_responsavel'];
            $obj->titulo = $reg['titulo'];
            $obj->texto = $reg['texto'];
            $obj->imagem = $reg['imagem'];
            $obj->anexo = $reg['anexo'];
            $obj->nome_assunto = $reg['nome_assunto'];
            $obj->nome_curso = $reg["nome_curso"];
            $obj->nome_responsavel = $reg["nome_responsavel"];
            $obj->tiponoticia = $reg['tiponoticia'];
            $obj->ano_semestre = $reg['ano_semestre'];
            
            $retorno[] = $obj;
        }
        return $retorno;
    }
    
    public function excluir() {
        $sql = "delete from $this->tabela where id=$this->id";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function editar() {
        $sql = "update $this->tabela set "
            . "data_publicacao='$this->data_publicacao',"
            . "data_evento='$this->data_evento',"
            . "data_validade='$this->data_validade',"
            . "id_tiponoticia=$this->id_tiponoticia,"
            . "id_assunto=$this->id_assunto,"
            . "id_responsavel=$this->id_responsavel,"
            . "titulo='$this->titulo', "
            . "texto='$this->texto', "
            . "imagem='$this->imagem',"
            . "anexo='$this->anexo' "
            . "where id=$this->id ";
        //echo "<br>Query: ".$sql."<br>";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function retornarunico() {
        /*  Mostra reg. único */
        $sql = "SELECT $this->tabela.*,"
                . " Assunto.nomecurto as nome_assunto,"
                . " Assunto.ano_semestre as ano_semestre,"
                . " Curso.nomecurto as nome_curso,"
                . " Responsavel.nome as nome_responsavel,"
                . " TipoNoticia.descricao as tiponoticia"
                . " FROM $this->tabela "
                . "INNER JOIN Assunto     ON Assunto.id      = $this->tabela.id_assunto "
                . "INNER JOIN Curso       ON Assunto.id_curso= Curso.id "
                . "INNER JOIN Responsavel ON Responsavel.id  = $this->tabela.id_responsavel "
                . "INNER JOIN TipoNoticia ON TipoNoticia.id  = $this->tabela.id_tiponoticia "
                . "WHERE $this->tabela.id=$this->id";
        
        
        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;

        $reg = mysqli_fetch_assoc($resultado);
        
        if ($this->debug) { 
            echo "<br>$sql<br>";
            echo "<br>retornaunico: ". $this->id."<br>";
            print_r($reg);
            echo "<br><br>";
        }
        
        if ($reg == true) {
            
            $obj1 = new Noticia();
            $obj1->id=$reg["id"];
            $obj1->data_publicacao = $reg['data_publicacao'];
            $obj1->data_evento = $reg['data_evento'];
            $obj1->data_validade = $reg['data_validade'];
            $obj1->id_tiponoticia = $reg['id_tiponoticia'];
            $obj1->id_assunto = $reg['id_assunto'];
            $obj1->id_responsavel = $reg['id_responsavel'];
            $obj1->titulo = $reg['titulo'];
            $obj1->texto = $reg['texto'];
            $obj1->imagem = $reg['imagem'];
            $obj1->anexo = $reg['anexo'];
            $obj1->nome_responsavel = $reg['nome_responsavel'];
            $obj1->nome_assunto = $reg['nome_assunto'];
            $obj1->nome_curso = $reg["nome_curso"];
            $obj1->tiponoticia = $reg['tiponoticia'];
            $obj1->ano_semestre = $reg['ano_semestre'];
            
            $retorno = $obj1;
            
            if ($this->debug) { echo "if..."; print_r($obj1); }
        } else {
            $retorno = null;
            if ($this->debug) { echo "else..."; }
        }

        return $retorno;
    }
    
    public function conta() {
        $lista = $this->listar();
        return count($lista);
    }
    
    public function MostraDados() {
        $temp45  = "<br>";
        $temp45 .= "ID=$this->id / data_publicacao=$this->data_publicacao"
            . " / data_evento=$this->data_evento"
            . " / data_validade=$this->data_validade"
            . " / id_tiponoticia=$this->id_tiponoticia"
            . " / id_assunto=$this->id_assunto"
            . " / id_responsavel=$this->id_responsavel"
            . " / titulo=$this->titulo"
            . "<br> / texto=$this->texto / <br>"
            . " / imagem=$this->imagem"
            . " / anexo=$this->anexo"
            . " / nome_responsavel=$this->nome_responsavel"
            . " / nome_assunto=$this->nome_assunto"
            . " / nome_curso=$this->nome_curso"
            . " / tiponoticia=$this->tiponoticia"
            . "<br>";
        echo $temp45;
        return true;
    }

}