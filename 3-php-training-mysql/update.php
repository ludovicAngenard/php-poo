<?php 
include 'fonction.php';
$id=isset($_GET['id'])?$_GET['id']: 0;
$changement=findOneById($id);


if('POST' == $_SERVER['REQUEST_METHOD'] ) 
		{
			
			if ( $_POST['Name'] !="" && $_POST['PlayerMin'] !="" && $_POST['PlayerMax'] !="" &&$_POST['AgeMin'] !="" &&$_POST['AgeMax'] !="" && $_POST['Picture'] !="")
			{
				$postName=$_POST['Name'];
				$postePlayerMin=$_POST['PlayerMin'];
				$postPlayerMax=$_POST['PlayerMax'];
				$postAgeMin=$_POST['AgeMin'];
				$postAgeMax=$_POST['AgeMax'];
				$postPicture=$_POST['Picture'];
				if ( $postePlayerMin>0 && $postAgeMin>0  && $postPlayerMax>$postePlayerMin && $postAgeMax>$postAgeMin)
				{

					$boardgame= new Boardgame($_POST);
					$instance= DBConnection::getInstance();			
					$query="UPDATE boardgames SET name = :name, players_min=:playerMin, players_max=:playerMax, age_min=:ageMin, age_max=:ageMax, picture=:picture WHERE id=:id";
					$prepare= $instance->getConnection()->prepare($query);
					$execute= $prepare->execute( array ('name'=>$postName, 'playerMin'=>$postePlayerMin, 'playerMax'=>$postPlayerMax, 'ageMin'=>$postAgeMin,'ageMax'=>$postAgeMax,'picture'=>$postPicture, 'id'=>$id));
					
					if ($execute ==true){
						echo'Le jeu de société a été changé avec succès.';
					}
					else{
						echo'le message n\' a pas été changé.';
						error_log($prepare->error_Code());
					}
				}
			}
		}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modififier un jeu de société</title>
</head>
<body>
	<a href="./read.php">Liste des données</a>
	<h1>Modifier un jeu de société</h1>
	<?php

$action='#';
$method='POST';
$form = new Form($action,$method);

$form->addTextField('Name',$changement->getName())
	->addNumberField('AgeMin',$changement->getAgeMin())
	->addNumberField('AgeMax',$changement->getAgeMax())	
	->addNumberField('PlayerMin',$changement->getPlayerMin())
	->addNumberField('PlayerMax',$changement->getPlayerMax())
	->addTextField('Picture',$changement->getPicture())
	->addSubmitButton('Modifier');
echo $form->build(); 

?>
	
</body>
</html>
