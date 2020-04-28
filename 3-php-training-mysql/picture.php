<?php
 class PictureHtml{
    
     private $content;

    public function __construct($content) {  //permet de prendre les valeurs, de les faire vérifier et d'éviter les inections sql
       $this->content=$content;
    }
    public function __toString(){
        return  "<img src=".$this->content."></image>";
        
    }  
}
?>