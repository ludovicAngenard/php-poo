<?php
 class LinkHtml{
     private $class;
     private $content;
     private $href;
    public function __construct($class,$content,$href) {  //permet de prendre les valeurs, de les faire vérifier et d'éviter les inections sql
       $this->class=$class;
       $this->content=$content;
       $this->href=$href;
    }
    public function __toString(){
        return  "<a class= '$this->class' href= '$this->href'> $this->content</a>";
        
    }  
}
?>