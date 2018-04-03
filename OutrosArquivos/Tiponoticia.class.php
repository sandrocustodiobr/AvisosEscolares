<?php

class Tiponoticia {
    private $id;
    private $descricao;
    
    private $tabela;
    private $link;
    
    private $objTemp;
    
    private $debug=FALSE;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', 'root', 'AvisosEscolares')
            or die ("<h3>Erro ao conectar ao servidor...</h3>");        
        $this->tabela = "TipoNoticia";
        $this->admin = FALSE;
        if ($this->debug) { echo "construct..."; }
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
        $sql = "INSERT INTO $this->tabela (descricao) values ('$this->descricao')";
        $retorno = mysqli_query($this->link, $sql);

        if ($this->debug) { echo " Query: $sql... Ret: $retorno..."; }
        return $retorno;
    }
    
    public function MostraDados() {
        echo "<br>".$this->id."<br>".$this->descricao."<br>";
    }
    
    public function listar($complemento = "") {     
        $sql = "SELECT * FROM $this->tabela ".$complemento;

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;
        
        while ($reg = mysqli_fetch_assoc($resultado)) {
            
            $obj = new Tiponoticia();
            $obj->id = $reg["id"];
            $obj->descricao = $reg["descricao"];
            
            $retorno[] = $obj;
        }
        return $retorno;
    }
    
    public function excluir() {
        $retorno = false;
        $sql = "delete from $this->tabela where id=$this->id";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function editar() {
        $retorno = false;
        $sql = "update $this->tabela set descricao='$this->descricao' where id=$this->id";
        //echo "<br>Query: ".$sql."<br>";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function retornarunico() {
        /*  Mostra reg. único */
        $sql = "Select * FROM $this->tabela where id=$this->id";
        
        //echo "<br>retornaunico: ". $this->id."<br>";

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;

        $req = mysqli_fetch_assoc($resultado);
        
        if ($req == true) {
            $obj23 = new Tiponoticia();
            $obj23->id=$req["id"];
            $obj23->descricao=$req["descricao"];

            $retorno = $obj23;
            
            if ($this->debug) { echo "if..."; }
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

}