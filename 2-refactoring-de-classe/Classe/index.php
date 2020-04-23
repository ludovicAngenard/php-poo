<?php

include 'autoload.php'; //redirige vers l'autoload.php

// accès utilisateur
$action = '#';
$method = 'POST';
$name = 'Pandémie';
$min_age = 14;
$min_players = 2;
$max_players = 4;
$is_available = (bool) true;

// on essaye d'instancier la classe form et de générer le formulaire
try{
$form = new Form($action, $method);
$form->addTextField('Name',$name)
    ->addNumberField('Picture',$picture)
    ->addNumberField('AgeMin',$min_age)
    ->addNumberField('PlayerMax',$min_players)
    ->addNumberField('AgeMax',$max_players)
    ->addNumberField('AgeMin',$min_players)
    ->addCheckboxField('is_available', $is_available)
    ->addSubmitButton('Modifier');
}
catch (ExceptionTextField $Exception){ //on attrape une erreur si ce n'est pas un texte qui est envoyé dans textfield
    echo $Exception->getMessage();
}
catch (ExceptionLenghtTextField $Exception){//on attrape une erreur si le texte envoyé n'est pas assez long
    echo $Exception->getMessage();
}

catch (ExceptionQuoteTextField $Exception){// on attrape une erreur si le texte commence par des guillemets
    echo $Exception->getMessage();
}
catch (ExceptionIsANumber $Exception){// on attrape une erreur si ce n'est pas un nombre envoyé dans NumberField
    echo $Exception->getMessage();
}
catch (ExceptionNothingNumberField $Exception){// on attrape une erreur si il n'ya rien d'ajouté 
}

catch (ExceptionSuperiorNumberField $Exception){ // on attrape une erreur si le numéro n'est pas supérieur à 0 
    echo $Exception->getMessage();
}

echo $form->build(); // affiche notre html