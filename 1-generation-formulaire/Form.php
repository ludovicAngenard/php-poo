<?php

class Form{
    private $html; // contient tout le formulaire html au fur et à mesure de sa conseption

    public  function __construct(string $action, string $method){ // le construct permet de créer la balise ouvrante <form> à partir de l'action et de la méthode
        $this->html="<form action= $action  method= $method >";
        return $this->html;
    }

    public function addTextField(string $name, string $value){ // permet de créer un input, le nom et la valeur de celui ci sont requis
       $this->html.= "<input name='$name' value='$value' >";
       
       return $this;
    }

    public function addSubmitButton(string $content){ // permet de créer un bouton submit à partir du contenu du bouton 
        $this->html.="<button type=submit> $content </button>";
        return $this;
    }

    public function addSelect(string $name,array $options){ // permet de créer un select a partir du name et d'un tableau 
        $this->html.="<select name=$name >";
        foreach($options as $nb => $option){
            $this->html.="<option value='$nb'>$option</option>";
        }
        
        $this->html.="</select>";
        return $this;
    }

    public function addTextArea(string $name,string $text){ // permet de créer un textarea a partir du name et de son contenu 
        $this->html.=" <textarea  name='$name' > $text</textarea>";
        return $this;
    }

    public function addRadio(string $name, array $radios){ // permet de créer des radio bouton a partir du name et d'un tableau 
        foreach($radios as $nb => $radio){
            $this->html.="<div> <input type=radio  name='$name'' value='$nb'> <label for='$nb'> $radio</label> </div>";
        }
        return $this;
       
    }

    public function build(){ // permet de fermer la balise <form> et de retourner le formulaire html
        return "$this->html </form>";
    }

}
