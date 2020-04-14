<?php
abstract class HtmlField {
    private $name;
    private $value;

    private function isValid(){
        return true;
    }

    public function __construct($name, $value) {
        if ($this->isValid()) { 
            $this->name= $name;
            $this->value = $value;
        }
    }
}