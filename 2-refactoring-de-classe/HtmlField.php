<?php
abstract class HtmlField {
    protected $name;
    protected $value;

    private function isValid($value){
        return true;
    }

    public function __construct(string $name, string $value) {
        if ($this->isValid($this->value)) { 
            $this->name= $name;
            $this->value = $value;
        }
    }

}
