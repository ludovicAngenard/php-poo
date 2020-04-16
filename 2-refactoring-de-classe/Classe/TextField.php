<?php 
 class TextField extends HtmlField{

    protected function isValid($value){
        if (!is_string($value)  ){
            throw new ExceptionTextField("La valeur que vous avez mis n'est pas un texte");
        }
        elseif(strlen($value)<=2){
            throw new ExceptionLenghtTextField("Le texte que vous avez mis n'est pas assez long ");
        }
        elseif(substr($value, 0,1)=="'" || substr($value, 0,1)=='"'){
            throw new ExceptionQuoteTextField("Le guillemet n'est pas permis au début de la chaine de caractère ");
        }
        elseif(strlen($value)==0){
            throw new ExceptionNothingNumberField("Vous n'avez rien ajouté");
        }
        else{
            return parent::isValid($value);
        } 
    }

    public function __toString(){
        return "<input type='text' name='$this->name' value='$this->value'>";
        
    }  
}
?>