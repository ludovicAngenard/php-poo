<?php 
 class CheckboxField extends HtmlField{
       
    public function __toString(){
        $this->value=htmlspecialchars($this->value);
        $checked = ($this->value)?'checked':'';
        return "<input type='checkbox' name='$this->name' $checked>";
        
    }  
}
?>