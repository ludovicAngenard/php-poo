<?php
abstract class HtmlField {
    protected $name;
    protected $value;

    public function __construct(string $name, string $value) {
        if ($this->isValid($this->value)) { 
            $this->name= $name;
            $this->value = $value;
        }
    }


    protected function isValid($value){
        return true;
    }

    
}
