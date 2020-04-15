<?php 
 class NumberField extends HtmlField{

    protected function isValid($value){
        if (!is_numeric($value) || !strlen($value)>0 ){
            throw new Exception("hop hop hop c'est pas bon, $value est incorrecte.");
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