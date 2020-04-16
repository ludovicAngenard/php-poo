<?php

include 'autoload.php';

class Form {

    private $fields = [];
    private $method;
    private $action;
    private $button;

    public function __construct(String $action, String $method)
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function classeField(string $classe,string $fieldName,string $fieldValue)
    {
        return $this->fields[] = new $classe($fieldName, $fieldValue);
    }

    public function addTextField(String $fieldName,  string $fieldValue)
    {  
       return $this->classeField('TextField',$fieldName,$fieldValue);  
    }

    public function addNumberField(String $fieldName, int $fieldValue) 
    {    
        return $this->classeField('NumberField',$fieldName,$fieldValue);     
    }

    public function addCheckboxField(String $fieldName, bool $fieldValue)
    {
        return $this->classeField('CheckboxField',$fieldName,$fieldValue);
    }

    public function addSubmitButton($text)
    {
        $this->button = "<input type='submit' value='$text'>";
    }

    public function build()
    {
        $html = "<form action='$this->action' method='$this->method'>";
        foreach($this->fields as $field)
        {
            $html .= $field;
        }
        $html .= $this->button;
        $html .= '</form>';
        return $html;
    }

}
?>