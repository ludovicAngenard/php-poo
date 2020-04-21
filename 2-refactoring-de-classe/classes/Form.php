<?php

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include $className.'.php';
});

class Form{

    private $fields;
    private $method;
    private $action;
    private $button;

    public function __construct(String $action, String $method)
    {
        $this->action = $action;
        $this->method = $method;
        $this->fields = [];
    }
    private function addField(HtmlField $field) {
        $this->fields[] = $field;
        return $this;
    }
    public function addTextField(String $name, String $value)
    {
        return $this->addField(new TextField($name, $value));
    }
    public function addNumberField(String $name, int $value)
    {
        return $this->addField(new NumberField($name, $value));
    }

    public function addCheckboxField(String $name, bool $value)
    {
        return $this->addField(new CheckboxField($name, $value));
    }
    /**
     * TODO : Refactor this to a class SelectboxField
     */
    public function addSelectboxField(Array $options, String $name, int $selected_id)
    {
        $html ="<select name=$name>";
        foreach ($options as $i => $option){
            $html .= "<option value ='$i'>$option</option>";
        }
        $html .="</select>";
        $this->fields[] = $html;
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