<?php
include 'fonction.php';

$id=isset($_GET['id'])?$_GET['id']: 0;
$supprimer=findOneById($id);
if('POST' == $_SERVER['REQUEST_METHOD'] ) 
        {
            $instance= DBConnection::getInstance();
            $query="DELETE FROM boardgames WHERE id=:id";
            $prepare= $instance->getConnection()->prepare($query);
            $execute= $prepare->execute( array ('id'=>$id));
            
            if ($execute ==true)
            {
                echo'Le jeu de société a été supprimé avec succès.';
            }
            else
            {
                echo'le message n\' a pas été supprimé.';
                error_log($prepare->error_Code());
            }
            
        }
        

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jeux de société</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <h1>Supression</h1> 
<?php

$action='#';
$method='POST';
$form = new Form($action,$method);

$form->addSubmitButton('Supprimer');
echo $form->build(); 
?>
 </body>
</html>