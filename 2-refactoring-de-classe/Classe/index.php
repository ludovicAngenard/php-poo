<?php
include 'Form.php';

// YOUR CODE HERE
$action = '#';
$method = 'POST';
$name = 'h';
$min_age = 14;
$min_players = 2;
$max_players = 4;
$is_available = (bool) true;

try{
$form = new Form($action, $method);
$form->addTextField('name',$name)
    ->addNumberField('min_age',$min_age)
    ->addNumberField('min_players',$min_players)
    ->addNumberField('max_players',$max_players)
    ->addCheckboxField('is_available', $is_available);

$form->addSubmitButton('Modifier');
}
catch (TextFieldException $Exception){
    echo $Exception->getMessage();
}
catch (LenghtTextFieldException $Exception){
    echo $Exception->getMessage();
}

catch (QuoteTextFieldException $Exception){
    echo $Exception->getMessage();
}
catch (IsANumberException $Exception){
    echo $Exception->getMessage();
}
catch (SuperiorNumberFieldException $Exception){
    echo $snfException->getMessage();
}

echo $form->build();