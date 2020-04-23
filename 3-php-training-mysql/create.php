<?php
include 'inc/DBConnection.php';
include 'inc/Boardgame.php';

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
					echo " Votre jeu à bien été sélectionné.";
				}
				
			}
		}
			
		
	?>
	<a href="./read.php">Liste des jeux</a>
	<h1>Ajouter un jeu de société</h1>
	<form action="#" method="post">
		<div>
			<label for="Name">Name</label>
			<input type="text" required name="Name" value="">
		</div>
		<div>
			<label for="AgeMin">Min Age</label>
			<input type="number" required name="AgeMin" value="">
		</div>
		<div>
			<label for="AgeMax">Max Age</label>
			<input type="number"  required name="AgeMax" value="">
		</div>
		<div>
			<label for="PlayerMin">Min Players</label>
			<input type="number" required name="PlayerMin" value="">
		</div>
		<div>
            <label for="PlayerMax">Max Players</label>
            <input type="number" required name="PlayerMax" value="">
        </div>
		<div>
			<label for="Picture">URL of a picture</label>
			<input type="text" required name="Picture" value="">
		</div>
		<button type="submit" >Envoyer</button>
	</form>

</body>
</html>
