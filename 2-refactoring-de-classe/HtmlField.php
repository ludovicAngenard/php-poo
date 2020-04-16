<?php
abstract class HtmlField {
    protected $name;
    protected $value;

        
    public function __construct(string $name, string $value) {
        if ($this->isValid($value)) { 
            $this->name= $name;
            $this->value = $value;
        }
    }


    protected function isValid($value){
        return true;
    }

    abstract public function __tostring();
}
