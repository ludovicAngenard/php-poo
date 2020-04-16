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
        $this->fields[] = new $classe($fieldName, $fieldValue);
        return $this;
    }

    public function addTextField(String $fieldName,  string $fieldValue)
    {  
       $this->classeField('TextField',$fieldName,$fieldValue);  
       return $this;
    }

    public function addNumberField(String $fieldName, int $fieldValue) 
    {    
        $this->classeField('NumberField',$fieldName,$fieldValue);     
        return $this;
    }

    public function addCheckboxField(String $fieldName, bool $fieldValue)
    {
        $this->classeField('CheckboxField',$fieldName,$fieldValue);
        return $this;
    }

    public function addSubmitButton($text)
    {
        $this->button = "<input type='submit' value='$text'>";
        return $this;
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