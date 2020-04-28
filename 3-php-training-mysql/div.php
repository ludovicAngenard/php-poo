<?php
 class DivHtml{
     private $class;
     private $content;
    public function __construct($class,$content) {  //permet de prendre les valeurs, de les faire vérifier et d'éviter les inections sql
       $this->class=$class;
       $this->content=$content;
    }
    public function __toString(){
        return "<div class= $this->class> $this->content </div>";
        
    }  
}
?>