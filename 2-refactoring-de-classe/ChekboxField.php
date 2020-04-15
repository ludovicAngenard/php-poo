<?php 
 class CheckboxField extends HtmlField{
    protected $name;
    protected $value;
    private function isValid($value){
            return true;
    }
     
    public function __construct(string $name, string $value) {
        if ($this->isValid($value)) { 
            $this->name= $name;
            $this->value = $value;
        }
    }
    public function __toString(){
        $this->value=htmlspecialchars($this->value);
        $checked = ($this->value)?'checked':'';
        return "<input type='checkbox' name='$this->name' $checked>";
        
    }  
}
?>