<?php

class Users {
    private $id;
    private $name;
    private $email;
   
    private $tabela;
    private $link;

    public function __construct() {
        $this->link = mysqli_connect('localhost:3306', 'root', '', 'daw')
            or die ("Erro ao conectar ao servidor");        
        $this->tabela = "user";
    }
    public function __destruct() {
        unset($this->link);
    }

    public function __get($key) {
        return $this->$key;
    }

    //método de retorno de valores do objeto 
    public function __set($key, $value) {
        $this->$key = $value;
    }

    //BANCO DE DADOS
    public function inserir() {
        
        $sql = "INSERT INTO $this->tabela (name,email) values ('$this->name','$this->email')";
		$retorno = mysqli_query($this->link, $sql);
                
        return $retorno;
    }
    
    public function listar($complemento = "") {     
        $sql = "SELECT * FROM $this->tabela ".$complemento;

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;
        
        while ($reg = mysqli_fetch_assoc($resultado)) {
            
            $obj = new Users();
            $obj->id = $reg["id"];
            $obj->name = $reg["name"];
            $obj->email = $reg["email"];

            $retorno[] = $obj;
        }
        return $retorno;
    }


   public function excluir() {
        
        $sql = "delete from $this->tabela where id='$this->id'";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    
   }
    public function editar() {
        $retorno = false;
        $sql = "update $this->tabela set name='$this->name', email='$this->email'
            where id=$this->id";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }

    public function retornarunico() {
        $sql = "Select * FROM $this->tabela where id=$this->id";

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;

        $req = mysqli_fetch_assoc($resultado);
        if ($req == true) {
            $obj = new Users();
            $obj->id=$req["id"];
            $obj->name=$req["name"];
            $obj->email=$req["email"];

            $retorno = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }
   
    
  }

?>