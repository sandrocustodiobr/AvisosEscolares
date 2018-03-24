<?php

/* 
 * VERIFICAÇÃO E FORMATAÇÃO DE DATA

$o = new Data($data);
if ($o->Valida() == 1) {
    ...
}
$o->FormatoParaGravacao();
$o->FormatoParaTela();

 */

class Data {
    public $dia;
    public $mes;
    public $ano;
         
    function __construct($pData) {
        $arrayData = explode("/","$pData"); // fatia a string $dat em pedados, usando / como referência
        $this->dia = $arrayData[0];
        $this->mes = $arrayData[1];
        $this->ano = $arrayData[2];
        if ( !$this->Valida() ) {
            $arrayData = explode("-","$pData"); // fatia a string $dat em pedados, usando / como referência
            $this->ano = $arrayData[0];
            $this->mes = $arrayData[1];
            $this->dia = $arrayData[2];
        }
    }

    function Valida(){
        // verifica se a data é válida! // 1 = true (válida) // 0 = false (inválida)
        $res = checkdate($this->mes, $this->dia, $this->ano);
        if ($res == 1){ // data ok
            return TRUE;
        } else { // data inválida
            return FALSE;
        }
    }

    function FormatoParaGravacao(){
        if ($this->Valida() == 1){ // data ok
            return $this->ano."-". $this->mes."-". $this->dia;
        } else { // data inválida
            return "";
        }
    }

    function FormatoParaTela(){
        if ($this->Valida() == 1){ // data ok
            return $this->dia."/". $this->mes."/". $this->ano;
        } else { // data inválida
            return "";
        }
    }
}