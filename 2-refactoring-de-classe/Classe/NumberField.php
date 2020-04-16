<?php 
 class NumberField extends HtmlField{

    protected function isValid($value){
        
        if (!is_numeric($value)  ){
            throw new ExceptionIsANumberField("Vous n'avez pas mis un nombre ");
        }
        elseif(strlen($value)==0){
            throw new ExceptionNothingNumberField("Vous n'avez rien ajouté");
        }
        elseif($value<=0){
            throw new ExceptionSuperiorNumberField("Le nombre n'est pas supérieur à 0");
        }
        else{
            return parent::isValid($value);
        } 
    }
   
    public function __toString(){
            return "<input type='number' name='$this->name' value='$this->value'>";
    }  
}
?>