<?php 
 class CheckboxField extends HtmlField{
       
    public function __toString(){
        $checked = ($this->value)?'checked':'';
        return "<input type='checkbox' name='$this->name' $checked>";
        
    }  
}
?>