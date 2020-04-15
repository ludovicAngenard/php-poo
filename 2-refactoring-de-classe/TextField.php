<?php 
 class TextField extends HtmlField{
    protected $name;
    protected $value;
    private function isValid($value){
        if (!is_string($value) && !strlen($value)<=2 ){
            throw new Exception("hop hop hop c'est pas bon, la valeur : '$value' est incorrecte.");
        }
        else{
            return true;
        } 
    }

    public function __construct(string $name, string $value) {
        
        if ($this->isValid($value)) { 
            $this->name= $name;
            $this->value = $value;
        }
    }

    public function __toString(){
        $this->value=htmlspecialchars($this->value);
        return "<input type='text' name='$this->name' value='$this->value'>";
        
    }  
}
?>