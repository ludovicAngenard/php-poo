<?php

include 'autoload.php';

class Form {

    private $fields = []; // tableau qui stock tous les objets  dans l'ordre de la génération du html 
    private $method;
    private $action;
    private $button;

    public function __construct(String $action, String $method) // permet de garder la méthode et l'action 
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function classeField(HtmlField $field) // permet d'instancier les objets dans le tableau et retourne Form
    {
        $this->fields[] = $field;
        return $this;
    }

    public function addTextField(String $fieldName,  string $fieldValue) // permet d'ajouter un input de texte et retourne Form
    {  
       $this->classeField(new TextField($fieldName,$fieldValue));  
       return $this;
    }

    public function addNumberField(String $fieldName, int $fieldValue)  // permet d'ajouter un input de nombre et retourne Form
    {    
        $this->classeField(new NumberField($fieldName,$fieldValue));     
        return $this;
    }

    public function addCheckboxField(String $fieldName, bool $fieldValue) // permet d'ajouter une cheackbox et retourne Form
    {
        $this->classeField(new CheckboxField($fieldName,$fieldValue));
        return $this;
    }

    public function addSubmitButton($text) // permet d'ajouter un bouton submit et retourne Form
    {
        $this->button = "<input type='submit' value='$text'>";
        return $this;
    }

    public function build() // permet de construire  le formulaire ne parcourant le tableau fields[]
    {
        $html = "<form action='$this->action' method='$this->method'>";
        foreach($this->fields as $field)
        {
            $html .= $field;
        }
        $html .= $this->button;
        $html .= '</form>';
        return $html;
    }

}
?>