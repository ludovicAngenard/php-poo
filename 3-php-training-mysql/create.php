<?php
include 'inc/DBConnection.php';
include 'inc/Boardgame.php';
include '../2-refactoring-de-classe/Classe/Form.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter un jeu de société</title>
</head>
<body>
	<?php
	
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
					$query="INSERT INTO boardgames (name,players_min,players_max,age_min,age_max,picture) VALUES (:name, :playerMin, :playerMax, :ageMin,:ageMax,:picture)";		
					$prepare= $instance->getConnection()->prepare($query);

					$execute= $prepare->execute( array ('name'=>$postName, 'playerMin'=>$postePlayerMin, 'playerMax'=>$postPlayerMax, 'ageMin'=>$postAgeMin,'ageMax'=>$postAgeMax,'picture'=>$postPicture));
					
					if ($execute ==true){
						echo'Le jeu de société a été ajouté avec succès.';
					}
					else{
						echo'le message n\' a pas été ajouté.';
						error_log($prepare->error_Code());
					}
				}
				
			}
		}
		
		
	?>
	<a href="./read.php">Liste des jeux</a>
	<h1>Ajouter un jeu de société</h1>
<?php
$action='#';
$method='POST';
$form= new Form($action,$method);
$form->addTextField('Name','')
	->addNumberField('AgeMin',1)
	->addNumberField('AgeMax',1)	
	->addNumberField('PlayerMin',1)
	->addNumberField('PlayerMax',1)
	->addTextField('Picture','')
	->addSubmitButton('Modifier');
echo $form->build(); 

?>

</body>
</html>
