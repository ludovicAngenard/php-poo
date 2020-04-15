<?php
class Form{

    private $fields = [];
    private $method;
    private $action;
    private $button;

    public function __construct(String $action, String $method)
    {
        $this->action = $action;
        $this->method = $method;
    }
    public function addTextField(String $fieldName, String $fieldValue)
    {
        $this->fields[] = "<input type='text' name='$fieldName' value='$fieldValue'>";
        return $this;
    }
    public function addNumberField(String $fieldName, int $fieldValue) {
        $this->fields[] = "<input type='number' name='$fieldName' value='$fieldValue'>";
        return $this;
    }

    public function addCheckboxField(String $fieldName, bool $fieldValue)
    {
        $checked = ($fieldValue)?'checked':'';
        $this->fields[] = "<input type='checkbox' name='$fieldName' $checked>";
        return $this;

    }
    public function addSubmitButton($text)
    {
        $this->button = "<input type='submit' value='$text'>";
    }
    public function build()
    {
        $html = "<form action='$this->action' method='$this->method'>";
        foreach($this->fields as $field){
            $html .= $field;
        }
        $html .= $this->button;
        $html .= '</form>';
        return $html;
    }
}