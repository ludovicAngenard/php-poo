<?php
abstract class HtmlField {
    protected $name;
    protected $value;

    private function isValid($value){
        return true;
    }

    public function __construct($name, $value) {
        if ($this->isValid($value)) { 
            $this->name= $name;
            $this->value = $value;
        }
    }
}