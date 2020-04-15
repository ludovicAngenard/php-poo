<?php
include 'Form.php';
include 'tableau.php';
// Des variables par défaut pour vos tests.

// YOUR CODE HERE
$action='toto';
$method='tata';
$nom='titi';
$prenom='tutu';
$form = new Form($action, $method);  // créer le début du formulaire
$form->addTextField('nom',$nom); // créer un input de type texte avec comme valeur par défaut $nom
$form->addTextField('prenom',$prenom); // créer un input de type texte avec comme valeur par défaut $prenom
$form->addSubmitButton('Modifier'); //Créer un bouton pour soumettre le formulaire se nommant Modifier
$form->addSelect('animal',$options);
$form->addTextArea('tt','tititututototata');
$form->addRadio('anmaux',$radios);
echo $form->build(); // générer le formulaire