<?php
abstract class HtmlField { 
    protected $name;
    protected $value;
   
    public function __construct(string $name, string $value) {  //permet de prendre les valeurs, de les faire vérifier et d'éviter les inections sql
        if ($this->isValid($value)) { 
            $this->name= htmlspecialchars($name);
            $this->value = htmlspecialchars($value);;
        }
    }


    protected function isValid($value){ // permet de  vérifier la valeur 
        return true;
    }

    abstract public function __tostring();
}
