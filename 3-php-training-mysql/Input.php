<?php
 class InputHtml{
     private $type;
     private $value;

    public function __construct($type,$value) {  //permet de prendre les valeurs, de les faire vérifier et d'éviter les inections sql
       $this->type=$type;
       $this->value=$value;
    }
    public function __toString(){
        return  "<input type=$this->type value=$this->value>";
        
    }  
}
?>