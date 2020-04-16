<?php 
 class CheckboxField extends HtmlField
 {
    public function isValid($value)
    {
        $this->value=($value)?'checked':'';
    }

    public function __toString()
    {
        return "<input type='checkbox' name='$this->name' $this->value>";
        
    }  
}
?>