<?php 
 class NumberField extends HtmlField{

    protected function isValid($value){
        
        if (!is_numeric($value) || strlen($value)<=0 ){
            throw new Exception("hop hop hop c'est pas bon, tu t'es trompé de valeur pour le nombre. tu as mis '$value' au lieu d'un nombre qui doit être supérieur a 0.");
        }
        else{
            return true;
        } 
    }
   
    public function __toString(){
            $this->value=htmlspecialchars($this->value);
            return "<input type='number' name='$this->name' value='$this->value'>";
    }  
}
?>